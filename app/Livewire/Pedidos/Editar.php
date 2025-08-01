<?php

namespace App\Livewire\Pedidos;

use App\Models\Pedido\DetallePedido;
use App\Models\Pedido\Pedido;
use App\Models\Producto\Producto;
use App\Models\Proveedor\Proveedor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Editar extends Component
{
    public $numero_pedido;
    public $pedido;
    public $observacion_pedido;
    public $proveedor_id;
    public $usuario_id;
    public $nombre_proveedor;

    public $query = '';
    public $modo_vista = [];
    public $modo_edicion_id = null;

    public $productosDisponibles;
    public $productosPedidos;
    public $productoCantidad = [];
    public $resumenPedido = [];
    public $cantidadEditada = [];

    public function mount($numero_pedido, $proveedor_id)
    {
        $user = Auth::user();
        $this->usuario_id = $user->id;
        $this->numero_pedido = $numero_pedido;
        $this->proveedor_id = $proveedor_id;

        $proveedor = Proveedor::find($proveedor_id);
        $pedido = Pedido::where('numero_pedido', $numero_pedido)->firstOrFail();
        $this->pedido = $pedido;
        $this->nombre_proveedor = $proveedor->nombre_proveedor;
        $this->productosDisponibles = collect();

        $detalle_pedidos = DetallePedido::where('pedido_id', $pedido->id)
            ->whereHas('producto', function ($query) {
                $query->where('nombre_producto', 'like', '%' . $this->query . '%');
            })
            ->with('producto')
            ->get();

        $this->productosPedidos = $detalle_pedidos;

        // $this->resumenPedido = $detalle_pedidos->pluck('pedidos');
        foreach ($detalle_pedidos as $item) {
            $this->resumenPedido[] = [
                'producto_id' => $item->producto->id,
                'nombre_producto' => $item->producto->nombre_producto,
                'unidad_medida' => $item->producto->unidad->nombre_unidad_medida,
                'cantidad' => $item->cantidad,
                'precio_unitario' => $item->producto->total_isv,
                'subtotal' => $item->cantidad * $item->producto->total_isv,
            ];
        }

        $this->buscarProductos();
    }

    public function updatedQuery()
    {
        $this->buscarProductos();
    }

    public function buscarProductos()
    {
        $idsProductosYaAgregados = $this->productosPedidos->pluck('producto_id')->toArray();

        $this->productosDisponibles = Producto::where('nombre_producto', 'like', '%' . $this->query . '%')
            ->where('proveedor_id', $this->proveedor_id)
            ->whereNotIn('id', $idsProductosYaAgregados)
            ->get();
    }

    public function render()
    {
        return view('livewire.pedidos.editar');
    }

    public function agregarProducto($productoId)
    {
        $producto = $this->productosDisponibles->find($productoId);

        if (!$producto || empty($this->productoCantidad[$productoId]) || $this->productoCantidad[$productoId] <= 0) {
            return;
        }

        $this->resumenPedido[] = [
            'producto_id' => $producto->id,
            'nombre_producto' => $producto->nombre_producto,
            'unidad_medida' => $producto->unidad->nombre_unidad_medida,
            'cantidad' => $this->productoCantidad[$productoId],
            'precio_unitario' => $producto->total_isv,
            'subtotal' => $this->productoCantidad[$productoId] * $producto->total_isv,
        ];

        $this->productosDisponibles = $this->productosDisponibles->filter(fn($p) => $p->id !== $productoId);

        unset($this->productoCantidad[$productoId]);
    }

    public function quitarProducto($productoId)
    {
        $productoQuitado = collect($this->resumenPedido)->firstWhere('producto_id', $productoId);

        if (!$productoQuitado) {
            return;
        }

        $this->resumenPedido = collect($this->resumenPedido)
            ->reject(fn($item) => $item['producto_id'] === $productoId)
            ->values()
            ->toArray();

        $productoOriginal = $this->obtenerProductoOriginal($productoId);
        if ($productoOriginal) {
            $this->productosDisponibles->push($productoOriginal);
        }
    }

    public function obtenerProductoOriginal($productoId)
    {
        return Producto::find($productoId);
    }


    public function editarCantidad($productoID)
    {
        $this->modo_edicion_id = $productoID;

        $index = collect($this->resumenPedido)->search(fn($item) => $item['producto_id'] === $productoID);
        if ($index !== false) {
            $this->cantidadEditada[$productoID] = $this->resumenPedido[$index]['cantidad'];
        }
    }

    public function guardar($productoID)
    {
        $index = collect($this->resumenPedido)->search(fn($item) => $item['producto_id'] === $productoID);

        if ($index !== false && isset($this->cantidadEditada[$productoID])) {
            $cantidad = (int) $this->cantidadEditada[$productoID];

            $this->resumenPedido[$index]['cantidad'] = $cantidad;
            $this->resumenPedido[$index]['subtotal'] =
                $cantidad * $this->resumenPedido[$index]['precio_unitario'];
        }

        $this->modo_edicion_id = null;
    }

    public function editar()
    {
        try {
            // Obtener productos enviados en el resumen
            $resumenIds = collect($this->resumenPedido)->pluck('producto_id')->toArray();

            // Eliminar registros que ya no están en el resumen
            DetallePedido::where('pedido_id', $this->pedido->id)
                ->whereNotIn('producto_id', $resumenIds)
                ->delete();

            // Procesar cada item del resumen
            foreach ($this->resumenPedido as $item) {
                $detalle = DetallePedido::where('pedido_id', $this->pedido->id)
                    ->where('producto_id', $item['producto_id'])
                    ->first();

                if ($detalle) {
                    // Si ya existe, actualiza
                    $detalle->update([
                        'cantidad' => $item['cantidad'],
                        'precio_unitario' => $item['precio_unitario'],
                        'subtotal' => $item['subtotal'],
                    ]);
                } else {
                    // Si no existe, crea uno nuevo
                    DetallePedido::create([
                        'pedido_id' => $this->pedido->id,
                        'producto_id' => $item['producto_id'],
                        'cantidad' => $item['cantidad'],
                        'precio_unitario' => $item['precio_unitario'],
                        'subtotal' => $item['subtotal'],
                    ]);
                }
            }

            session()->flash('success', 'Pedido Actualizado exitosamente');
            return redirect()->route('pedidos.index');
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al crear el producto: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al crear el producto.');
        }
    }
}
