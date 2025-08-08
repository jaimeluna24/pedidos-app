<?php

namespace App\Livewire\Pedidos;

use App\Models\Pedido\DetallePedido;
use Livewire\Component;
use App\Models\Pedido\Pedido;

class CrearEntregas extends Component
{
    public $numero_pedido;
    public $detalle_pedido;
    public $tipo;
    public $pedido;
    public $factura = null;
    public $estado_pedido = 'Sin Aprobar';

    public function render()
    {
        return view('livewire.pedidos.crear-entregas');
    }

    public function buscarPedido()
    {
        $pedido = Pedido::where('numero_pedido', $this->numero_pedido)->first();
        $detalle_pedido = DetallePedido::where('pedido_id', $pedido->id)->with('producto')->get();
        if ($pedido) {
            $this->pedido = $pedido;
            $this->detalle_pedido = $detalle_pedido;
            $this->estado_pedido = $pedido->estado_pedido;
            session()->flash('success', 'Pedido encontrado exitosamente.');
        } else {
            session()->flash('success', 'El pedido no se ha encontrado, verifique el número de pedido.');
        }
    }

    public function siguiente()
    {
        redirect()->route('pedidos.entregas.agregar.productos', [$this->numero_pedido, $this->tipo, $this->factura]);
        $this->numero_pedido = null;
    }
}
