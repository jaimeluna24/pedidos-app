<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pedido\Pedido;

class Index extends Component
{
    use WithPagination;

    public $query = '';
    public $fecha_inicio = '';
    public $fecha_fin = '';

    public function render()
    {
        $pedidos = Pedido::where(function ($query) {
            $query->where('numero_pedido', 'like', '%' . $this->query . '%')
                ->orWhereHas('proveedor', function ($q) {
                    $q->where('nombre_proveedor', 'like', '%' . $this->query . '%');
                });
        })
        ->when($this->fecha_inicio && $this->fecha_fin, function ($query) {
            $query->whereBetween('created_at', [
                $this->fecha_inicio . ' 00:00:00',
                $this->fecha_fin . ' 23:59:59'
            ]);
        })
        
            ->paginate(10);
        return view('livewire.pedidos.index', ['pedidos' => $pedidos]);
    }
    public function resetFilters(){

    $this->reset(['fecha_inicio', 'fecha_fin', 'query']);
     $this->resetPage();

    }
}
