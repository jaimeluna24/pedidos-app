<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pedido\Pedido;

class Index extends Component
{
    use WithPagination;

    public $query = '';

    public function render()
    {
        $pedidos = Pedido::where(function ($query) {
            $query->where('numero_pedido', 'like', '%' . $this->query . '%')
                ->orWhereHas('proveedor', function ($q) {
                    $q->where('nombre_proveedor', 'like', '%' . $this->query . '%');
                });
        })
            ->paginate(10);
        return view('livewire.pedidos.index', ['pedidos' => $pedidos]);
    }
}
