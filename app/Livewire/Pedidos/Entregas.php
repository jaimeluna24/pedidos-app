<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pedido\PedidoEntrega;


class Entregas extends Component
{
    use WithPagination;
    public $query = '';
    public $fecha_inicioentrega = '';
    public $fecha_finentrega = '';

    public function render()
    {
        $entregas = PedidoEntrega::where(function ($query) {
            $query->where('num_factura', 'like', '%' . $this->query . '%')
                ->orWhereHas('pedido', function ($q) {
                    $q->where('numero_pedido', 'like', '%' . $this->query . '%');
                });
        })
        ->when($this->fecha_inicioentrega && $this->fecha_finentrega, function ($query) {
            $query->whereBetween('created_at', [
                $this->fecha_inicioentrega . ' 00:00:00',
                $this->fecha_finentrega . ' 23:59:59'
            ]);
        })
        
        ->paginate(10);
        return view('livewire.pedidos.entregas', ['entregas' => $entregas]);
    }
    public function resetFilters(){

    $this->reset(['fecha_inicioentrega', 'fecha_finentrega', 'query']);
     $this->resetPage();

    }
}
