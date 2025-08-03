<?php

namespace App\Livewire\Inventarios;

use App\Models\Inventario\Inventario;
use App\Models\Inventario\MovimientoInventario;
use Livewire\Component;

class Detalles extends Component
{
    public $id;
    public $nueva_cantidad_minima;
    public $modo_cantidad_minima = true;
    public $inventario_encontrado;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $inventario = Inventario::find($this->id);
        $this->inventario_encontrado = $inventario;
        $this->nueva_cantidad_minima = $inventario->cantidad_minima;
        $movimientos = MovimientoInventario::where('inventario_id', $this->id)->paginate(10);
        // dd($movimientos);
        return view('livewire.inventarios.detalles', compact('inventario'), ['movimientos' => $movimientos]);
    }

    public function guardarCantidadMinima()
    {
        try {
             $this->inventario_encontrado->update([
            'cantidad_minima' => $this->nueva_cantidad_minima,
        ]);
        $this->modo_cantidad_minima = true;
        session()->flash('success', 'Cantidad mínima cambiada exitosamente.');
        } catch (\Throwable $th) {
        session()->flash('error', 'No se ha podido realizar la acción.');
        }
    }
}
