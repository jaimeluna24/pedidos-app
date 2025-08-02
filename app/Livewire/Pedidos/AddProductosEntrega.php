<?php

namespace App\Livewire\Pedidos;

use App\Models\Pedido\DetallePedido;
use App\Models\Pedido\Pedido;
use App\Models\Pedido\DetalleEntrega;
use App\Models\Pedido\PedidoEntrega;
use App\Models\Producto\Producto;
use App\Models\Proveedor\Proveedor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AddProductosEntrega extends Component
{
    public $numero_pedido;
    public $observacion_pedido;
    public $proveedor_id;
    public $usuario_id;
    public $nombre_proveedor;

    public $factura;
    public $tipo;
    public $pedido;

    public $query = '';
    public $modo_vista = [];
    public $modo_edicion_id = null;

    public $productosDisponibles;
    public $productoCantidad = [];
    public $resumenPedido = [];
    public $cantidadEditada = [];

    public function mount($numero_pedido, $tipo, $factura)
    {
        $user = Auth::user();
        $pedido = Pedido::where('numero_pedido', $numero_pedido)->first();
        $this->pedido = $pedido;
        $this->usuario_id = $user->id;
        $this->numero_pedido = $numero_pedido;
        $this->factura = $factura;
        $this->tipo = $tipo;
        $this->proveedor_id = $pedido->proveedor_id;

        $proveedor = Proveedor::find($pedido->proveedor_id);
        $this->nombre_proveedor = $proveedor->nombre_proveedor;

        $this->productosDisponibles = collect();

        $this->buscarProductos();
    }

    public function updatedQuery()
    {
        $this->buscarProductos();
    }

    public function buscarProductos()
    {
         $detalle_pedidos = DetallePedido::where('pedido_id', $this->pedido->id)
            ->whereHas('producto', function ($query) {
                $query->where('nombre_producto', 'like', '%' . $this->query . '%');
            })
            ->with('producto')
            ->get();
        $this->productosDisponibles = $detalle_pedidos;
        // dd($this->productosDisponibles);
    }

    public function render()
    {
        return view('livewire.pedidos.add-productos-entrega');
    }

     public function agregarProducto($productoId)
    {
        $producto = $this->productosDisponibles->find($productoId);

        if (!$producto || !isset($this->productoCantidad[$productoId]) || $this->productoCantidad[$productoId] < 0) {
            return;
        }

        $this->resumenPedido[] = [
            'producto_id' => $producto->id,
            'producto_agregar_id' => $producto->producto->id,
            'nombre_producto' => $producto->producto->nombre_producto,
            'unidad_medida' => $producto->producto->unidad->siglas,
            'cantidad' => $this->productoCantidad[$productoId],
            'precio_unitario' => $producto->producto->total_isv,
            'subtotal' => $this->productoCantidad[$productoId] * $producto->producto->total_isv,
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
        return DetallePedido::find($productoId);
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

     public function crear()
    {
        // try {
            $pedidoEntrega = PedidoEntrega::create([
                'pedido_id' => $this->pedido->id,
                'num_factura' => $this->factura,
                'tipo' => $this->tipo,
                'usuario_id' => $this->usuario_id
            ]);

            $this->pedido->update([
                'estado_entrega' => 'Entregado',
                'fecha_entrega' => now(),
            ]);

            foreach ($this->resumenPedido as $item) {
                DetalleEntrega::create([
                    'pedido_entrega_id' => $pedidoEntrega->id,
                    'producto_id' => $item['producto_agregar_id'],
                    'cantidad_recibida' => $item['cantidad'],
                    'precio_unitario' => $item['precio_unitario'],
                    'subtotal' => $item['subtotal'],
                ]);
            }



            session()->flash('success', 'Entrega creado exitosamente');
            return redirect()->route('pedidos.entregas');
        // } catch (ValidationException $e) {
        //     session()->flash('error', 'Error de validación. Verifica los campos.');
        // } catch (\Exception $e) {
        //     Log::error('Error al crear la entrega: ' . $e->getMessage());
        //     session()->flash('error', 'Ocurrió un error inesperado al crear la entrega.');
        // }
    }
}
