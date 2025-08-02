<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pedido\PedidoEntrega;


class Entregas extends Component
{
    use WithPagination;
    public $query = '';

    public function render()
    {
        $entregas = PedidoEntrega::where(function ($query) {
            $query->where('num_factura', 'like', '%' . $this->query . '%')
                ->orWhereHas('pedido', function ($q) {
                    $q->where('numero_pedido', 'like', '%' . $this->query . '%');
                });
        })->paginate(10);
        return view('livewire.pedidos.entregas', ['entregas' => $entregas]);
    }
}
