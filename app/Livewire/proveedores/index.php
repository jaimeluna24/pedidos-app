<?php

namespace App\Livewire\Proveedor;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Proveedor\Proveedor;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class index extends Component
{
    use WithPagination;
    public $proveedor;
    public $rtn;
    public $nombre_proveedor;
    public $telefono;
    public $numero_adjudicacion;
    public $tipo_adjudicacion_id;
    public $tipo_proveedor_id;
    public $creador_id;

    public $modal = false;
    public function render()
    {
        $proveedor = Proveedor::where('nombre_proveedor', 'like', '%' . $this->query . '%')->paginate(10);
        return view('livewire.proveedor.index', ['Proveedor' => $proveedor]);
    }

     public function crear()
    {
        try {
            $this->validate([
                'nombre_proveedor' => 'required|string|max:255|unique:proveedores,nombre_proveedor',
            ]);

            Proveedor::create([
                'rtn' => $this->rtn,
                'nombre_proveedor' => $this->nombre_proveedor,
                'telefono' => $this->telefono,
                'numero_adjudicacion' => $this->numero_adjudicacion,
                'tipo_adjudicacion_id' => $this->tipo_adjudicacion_id,
                'tipo_proveedor_id' => $this->tipo_proveedor_id,
                'creador_id' => $this->creador_id,
            ]);
            $this->reset(['rtn', 'nombre_proveedor', 'telefono', 'numero_adjudicacion', 'tipo_adjudicacion_id', 'tipo_proveedor_id', 'creador_id']);

            session()->flash('success', 'Proveedor creado exitosamente.');
            $this->dispatch('cerrar-modal');

            return redirect()->route('mantenimientos.proveedores.index');
        }

        catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al crear proveedor: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al crear proveedor.');
        }
    
    }

    public function abrirEditar($id)
    {
        $proveedor = Proveedor::find($id);
        $this->rtn = $proveedor->rtn;
        $this->nombre_proveedor = $proveedor->nombre_proveedor;
        $this->telefono = $proveedor->telefono;
        $this->numero_adjudicacion = $proveedor->numero_adjudicacion;
        $this->tipo_adjudicacion_id = $proveedor->tipo_adjudicacion_id;
        $this->tipo_proveedor_id = $proveedor->tipo_proveedor_id;
        $this->creador_id = $proveedor->creador_id;
        $this->modal = true;
    }
       
    public function cerrarEditar()
    {
        $this->reset(['modal', 'nombre_proveedor', 'telefono', 'numero_adjudicacion', 'tipo_adjudicacion_id', 'tipo_proveedor_id', 'creador_id']);
    }

    public function editar()
    {
        try {
            $this->validate([
                'nombre_proveedor' => [
                    'required',
                    'string',
                    Rule::unique('proveedores', 'nombre_proveedor')->ignore($this->proveedor->id),
                ],
            ]);

            $this->proveedor->update([
                'rtn' => $this->rtn,
                'nombre_proveedor' => $this->nombre_proveedor,
                'telefono' => $this->telefono,
                'numero_adjudicacion' => $this->numero_adjudicacion,
                'tipo_adjudicacion_id' => $this->tipo_adjudicacion_id,
                'tipo_proveedor_id' => $this->tipo_proveedor_id,
                'creador_id' => $this->creador_id,
            ]);

            $this->reset(['rtn', 'nombre_proveedor', 'telefono', 'numero_adjudicacion', 'tipo_adjudicacion_id', 'tipo_proveedor_id', 'creador_id']);

            session()->flash('success', 'Proveedor actualizado exitosamente.');
            $this->modal = false;
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar el proveedor: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al actualizar el proveedor.');
        }
                
    }
}
