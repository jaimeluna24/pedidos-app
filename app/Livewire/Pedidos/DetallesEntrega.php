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

    public function mount($id)
    {
        $this->id = $id;
        $this->user = Auth::user();
        $pedidoEntrega = PedidoEntrega::with('detalles', 'pedido')->find($id);
        $this->pedido = $pedidoEntrega;
        $this->numero_pedido = $pedidoEntrega->numero_pedido;
        $this->nombre_proveedor = $pedidoEntrega->pedido->proveedor->nombre_proveedor;
        $this->proveedor_id = $pedidoEntrega->proveedor_id;
        $this->factura = $pedidoEntrega->num_factura;
        $this->tipo = $pedidoEntrega->tipo;
        $userPedido = Usuario::find($pedidoEntrega->usuario_id);
        $this->nombre_user = $userPedido->nombre_usuario;
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
        return view('livewire.pedidos.detalles-entrega');
    }
}
