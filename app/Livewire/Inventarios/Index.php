<?php

namespace App\Livewire\Inventarios;

use App\Models\Inventario\Inventario;
use App\Models\Inventario\MovimientoInventario;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $query = '';
    public $inventario;
    public $nombre_producto;
    public $tipo_movimiento;
    public $cantidad_disponible;
    public $cantidad = 1;
    public $modal = false;
    public $referencia;

    public function render()
    {
        $inventarios = Inventario::join('productos', 'inventarios.producto_id', '=', 'productos.id')
            ->whereHas('producto', function ($q) {
                $q->where('nombre_producto', 'like', '%' . $this->query . '%');
            })
            ->orderBy('productos.nombre_producto', 'asc')
            ->select('inventarios.*') // importante para que el paginador funcione bien
            ->paginate(35);
        return view('livewire.inventarios.index', ['inventarios' => $inventarios]);
    }

    public function abrirMovimientos($id)
    {
        $this->inventario = Inventario::find($id);
        $this->nombre_producto = $this->inventario->producto->nombre_producto;
        $this->cantidad_disponible = $this->inventario->cantidad_actual;
        $this->modal = true;
    }

    public function cerrarMovimientos()
    {
        $this->reset(['modal', 'nombre_producto', 'cantidad_disponible', 'cantidad', 'tipo_movimiento']);
    }

    public function movimientosGuardar()
    {
        try {
            $user = Auth::user();

            $this->validate([
                'cantidad' => 'required|numeric|min:0.01',
                'tipo_movimiento' => 'required'
            ]);

            $movimiento = MovimientoInventario::create([
                'inventario_id' => $this->inventario->id,
                'tipo_movimiento' => $this->tipo_movimiento,
                'cantidad' => $this->cantidad,
                'referencia' => $this->referencia,
                'usuario_id' => $user->id,
            ]);

            if ($movimiento->tipo_movimiento == 'Egreso') {
                $this->inventario->update([
                    'cantidad_actual' => $this->inventario->cantidad_actual - $this->cantidad,
                    'fecha_ultimo_egreso' => now()
                ]);
            } else {
                $this->inventario->update([
                    'cantidad_actual' => $this->inventario->cantidad_actual + $this->cantidad,
                    'fecha_ultimo_egreso' => now()
                ]);
            }

            $this->reset(['modal', 'nombre_producto', 'cantidad_disponible', 'cantidad', 'tipo_movimiento', 'referencia']);

            session()->flash('success', 'Movimiento realizado exitosamente.');
            $this->modal = false;
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al arealizar el movimiento: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al realizar el movimiento.');
        }
    }
}
