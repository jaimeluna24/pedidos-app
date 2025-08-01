<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto\Producto;

class Index extends Component
{
    use WithPagination;

    public $query = '';

    public function render()
    {
        $productos = Producto::where(function ($query) {
            $query->where('nombre_producto', 'like', '%' . $this->query . '%')
                ->orWhereHas('proveedor', function ($q) {
                    $q->where('nombre_proveedor', 'like', '%' . $this->query . '%');
                });
        })
            ->paginate(10);
        return view('livewire.productos.index', ['productos' => $productos]);
    }
}
