<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use App\Models\Pedido\Pedido;
use App\Models\Pedido\DetallePedido;
use App\Models\Pedido\PedidoEntrega;
use App\Models\Pedido\DetalleEntrega;
use App\Models\Usuario\Usuario;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Spatie\Browsershot\Browsershot;

use App\Exports\PedidoExport;
use App\Models\Producto\Producto;
use Maatwebsite\Excel\Facades\Excel;

class DetallesEntrega extends Component
{
    public $id;
    public $pedido;
    public $numero_pedido;
    public $observacion_pedido;
    public $proveedor_id;
    public $usuario_id;
    public $nombre_proveedor;
    public $user;
    public $factura;
    public $tipo;
    public $nombre_user;

    public $query = '';
    public $productosPedidos = [];

    public $pedido_id;
    public $detallePedido;
    public $detalleEntrega;
    public $pedidoExportar = [];
    public $totalDetalleEntrega = 0;

    public function mount($id)
    {
        $this->id = $id;
        $this->user = Auth::user();
        $pedidoEntrega = PedidoEntrega::with('detalles', 'pedido')->find($id);
        $this->pedido = $pedidoEntrega;
        $this->numero_pedido = $pedidoEntrega->pedido->numero_pedido;
        $this->nombre_proveedor = $pedidoEntrega->pedido->proveedor->nombre_proveedor;
        $this->proveedor_id = $pedidoEntrega->proveedor_id;
        $this->factura = $pedidoEntrega->num_factura;
        $this->tipo = $pedidoEntrega->tipo;
        $userPedido = Usuario::find($pedidoEntrega->usuario_id);
        $this->nombre_user = $userPedido->nombre_usuario;
        $this->pedido_id = $pedidoEntrega->pedido_id;

        $this->detallePedido = collect();
        $this->detalleEntrega = collect();



        $this->detallePedido = DetallePedido::where('pedido_id', $pedidoEntrega->pedido_id)->get();
        $this->detalleEntrega = DetalleEntrega::where('pedido_entrega_id', $pedidoEntrega->id)->get();

        foreach($this->detallePedido as $item){
            $this->datosExcel($item->producto_id);
        }


    }

    public function render()
    {
        $detalle_entrega = DetalleEntrega::where('pedido_entrega_id', $this->pedido->id)
            ->whereHas('producto', function ($query) {
                $query->where('nombre_producto', 'like', '%' . $this->query . '%');
            })
            ->with('producto')
            ->get();


        $this->productosPedidos = $detalle_entrega;
        $this->totalDetalleEntrega = $detalle_entrega->sum('subtotal');
        return view('livewire.pedidos.detalles-entrega');
    }

    public function datosExcel($producto_id)
    {
        $producto = Producto::find($producto_id);
        $productoPedido = $this->detallePedido->where('producto_id', $producto_id)->first();
        $productoEntrega = $this->detalleEntrega->where('producto_id', $producto_id)->first();

        $this->pedidoExportar[] = [
                'nombre_producto' => $producto->nombre_producto,
                'unidad' => $producto->unidad->siglas,
                'pedido' => (string)($productoPedido->cantidad),
                'recibido' => (string)($productoEntrega->cantidad_recibida ?? 0),
                'diferencia' => (string)($productoEntrega->cantidad_recibida ?? 0 - $productoPedido->cantidad),
                'precio_unitario' => $producto->total_isv,
                'valor_pedido' => (string)($productoPedido->cantidad * $producto->total_isv),
                'valor_recibido' => (string)($productoEntrega->cantidad_recibida ?? 0 * $producto->total_isv),
                'diferencia_valor' => (string)(($productoEntrega->cantidad_recibida ?? 0 * $producto->total_isv) - ($productoPedido->cantidad * $producto->total_isv))
        ];


    }

    public function exportarExcel()
    {
        // dd($this->numero_pedido);
        $datos = $this->pedidoExportar;
        $pedido = $this->numero_pedido;
        $fechaPedido = $this->pedido->pedido->created_at->format('Y/m/d');
        $fechaRecibido = $this->pedido->created_at->format('Y/m/d');

        return Excel::download(new PedidoExport($datos, $pedido, $fechaPedido, $fechaRecibido), $this->numero_pedido .'.xlsx');
    }
}
