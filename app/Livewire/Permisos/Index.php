<?php

namespace App\Livewire\Permisos;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use WithPagination;
    public $permiso;
    public $name;
    public $query = '';
    public $modal = false;

    public function render()
    {
        $permisos = Permission::where('name', 'like', '%'.$this->query.'%')->paginate(10);
        return view('livewire.permisos.index', ['permisos' => $permisos]);
    }

     public function crear()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $permiso = new Permission();
        $permiso->name = $this->name;
        $permiso->save();

        $this->name = '';
        redirect()->route('seguridad.permisos.index');
        session()->flash('success', 'Permiso creado exitosamente.');
        $this->dispatch('cerrar-modal');
    }

    public function abrirEditar($id)
    {
        $permiso = Permission::find($id);
        $this->permiso = $permiso;
        $this->name = $permiso->name;
        $this->modal = true;
    }

    public function cerrarEditar()
    {
        $this->reset(['modal', 'name']);
    }

    public function editar()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->permiso->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'Permiso actualizado exitosamente.');
        $this->modal = false;
    }
}
