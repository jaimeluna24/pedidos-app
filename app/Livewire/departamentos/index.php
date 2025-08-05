<?php

namespace App\Livewire\Departamentos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Usuario\Departamento;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class Index extends Component
{
    use WithPagination;
    public $Departamento;
    public $nombre_departamento;
    public $siglas;
    public $observacion;
    public $query = '';
    public $modal = false;
    public function render()
    {
        $Departamento = Departamento::where('nombre_departamento', 'like', '%' . $this->query . '%')->paginate(10);
        return view('livewire.departamentos.index', ['departamento' => $Departamento]);
    }

     public function crear()
    {
        try {
            $this->validate([
                'nombre_departamento' => 'required|string|max:255|unique:departamentos,nombre_departamento',
                'siglas' => 'required|string|max:255|unique:departamentos,siglas',
            ]);

            Departamento::create([
                'nombre_departamento' => $this->nombre_departamento,
                'siglas' => strtoupper(substr($this->siglas, 0, 3)),
                'observacion' => $this->observacion,
            ]);

            $this->reset(['nombre_departamento', 'siglas', 'observacion']);

            session()->flash('success', 'departamento creado exitosamente.');
            $this->dispatch('cerrar-modal');

            return redirect()->route('mantenimientos.departamentos.index');
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al crear departamento: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al crear departamento.');
        }
    }

    public function abrirEditar($id)
    {
        $Departamento = Departamento::find($id);
        $this->Departamento = $Departamento;
        $this->nombre_departamento = $Departamento->nombre_departamento;
        $this->siglas = $Departamento->siglas;
        $this->observacion = $Departamento->observacion;
        $this->modal = true;
    }

    public function cerrarEditar()
    {
        $this->reset(['modal', 'nombre_departamento', 'siglas','observacion']);
    }

    public function editar()
    {
        try {
            $this->validate([
                'nombre_departamento' => [
                    'required',
                    'string',
                    Rule::unique('departamentos', 'nombre_departamento')->ignore($this->Departamento->id),
                ],
            ]);

            $this->Departamento->update([
                'nombre_categoria' => $this->nombre_departamento,
                'siglas' => strtoupper(substr($this->siglas, 0, 3)),
                'observacion' => $this->observacion
            ]);

            $this->reset(['nombre_departamento', 'siglas','observacion']);


            session()->flash('success', 'departamento actualizado exitosamente.');
            $this->modal = false;
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al actualizar el departamento: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al actualizar el departamento.');
        }
    }
}
