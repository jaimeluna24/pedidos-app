<?php

namespace App\Livewire\proveedores;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Proveedor\Proveedor;
use App\Models\Proveedor\TipoAdjudicacion;
use App\Models\Proveedor\TipoProveedor;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Contracts\Service\Attribute\Required;

class Index extends Component
{
    use WithPagination;
    public $proveedor;
    public $rtn;
    public $nombre_proveedor;
    public $telefono;
    public $numero_adjudicacion;
    public $tipo_adjudicacion_id= '';
    public $tipo_proveedor_id= '';
    public $creador_id;

    public $query = '';
    public $modo_vista = false;

    public $modal = false;

    public function render()
    {
        $tipo_adjudicaciones = TipoAdjudicacion::all();
        $tipo_proveedores = TipoProveedor::all();
        $proveedores = Proveedor::where('nombre_proveedor', 'like', '%' . $this->query . '%')->paginate(10);
        return view('livewire.proveedores.index', ['proveedores' => $proveedores, 'tipo_adjudicaciones' => $tipo_adjudicaciones, 'tipo_proveedores' => $tipo_proveedores]);
    }

     public function crear()
    {
        try {
            $this->tipo_proveedor_id = ((int) $this->tipo_proveedor_id);
            $this->tipo_adjudicacion_id =  ((int) $this->tipo_adjudicacion_id);


            $this->validate([
                'rtn' => 'required|string|max:255|unique:proveedores,rtn',
                'nombre_proveedor' => 'required|string|max:255|unique:proveedores,nombre_proveedor',
                'telefono' => 'required|string|max:255|unique:proveedores,telefono',
                'numero_adjudicacion' => 'required|string|max:255|',
                'tipo_adjudicacion_id' => 'required|integer|exists:tipo_adjudicaciones,id',
                'tipo_proveedor_id' => 'required|integer|exists:tipo_proveedores,id'
            ]);

            Proveedor::create([
                'rtn' => $this->rtn,
                'nombre_proveedor' => $this->nombre_proveedor,
                'telefono' => $this->telefono,
                'numero_adjudicacion' => $this->numero_adjudicacion,
                'tipo_adjudicacion_id' => $this->tipo_adjudicacion_id,
                'tipo_proveedor_id' => $this->tipo_proveedor_id,
                'creador_id' => Auth::id()
            ]);
            $this->reset(['rtn', 'nombre_proveedor', 'telefono', 'numero_adjudicacion', 'tipo_adjudicacion_id', 'tipo_proveedor_id', 'creador_id']);

            session()->flash('success', 'Proveedor creado exitosamente.');
            $this->dispatch('cerrar-modal');

            return redirect()->route('proveedor.index');
        } catch (ValidationException $e) {
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
                'rtn' => [
                    'required',
                    'string',
                    Rule::unique('proveedores', 'rtn')->ignore($this->proveedor->id),
                ],
                'nombre_proveedor' => [
                    'required',
                    'string',
                    Rule::unique('proveedores', 'nombre_proveedor')->ignore($this->proveedor->id),    
                ],
                'telefono' => [
                    'required',
                    'string',
                    Rule::unique('proveedores', 'telefono')->ignore($this->proveedor->id),
                ],
                'numero_adjudicacion' => [
                    'required',
                    'string',
                    Rule::unique('proveedores', 'numero_adjudicacion')->ignore($this->proveedor->id),
                ],
                'tipo_adjudicacion_id' => [
                    'required',
                    'integer',
                    'exists:tipo_adjudicaciones,id',
                ],
                'tipo_proveedor_id' => [
                    'required',
                    'integer',
                    'exists:tipo_proveedores,id',
                ]
            ]);

            $this->proveedor->update([
                'rtn' => $this->rtn,
                'nombre_proveedor' => $this->nombre_proveedor,
                'telefono' => $this->telefono,
                'numero_adjudicacion' => $this->numero_adjudicacion,
                'tipo_adjudicacion_id' => $this->tipo_adjudicacion_id,
                'tipo_proveedor_id' => $this->tipo_proveedor_id,
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
