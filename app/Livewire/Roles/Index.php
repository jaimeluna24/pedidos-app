<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use WithPagination;
    public $rol;
    public $name;
    public $query = '';
    public $modal = false;

    public function render()
    {
        $roles = Role::where('name', 'like', '%'.$this->query.'%')->paginate(10);
        return view('livewire.roles.index', ['roles' => $roles]);
    }

    public function crear()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $rol = new Role();
        $rol->name = $this->name;
        $rol->save();

        $this->name = '';
        redirect()->route('seguridad.roles.index');
        session()->flash('success', 'Rol creado exitosamente.');
        $this->dispatch('cerrar-modal');
    }

    public function abrirEditar($id)
    {
        $rol = Role::find($id);
        $this->rol = $rol;
        $this->name = $rol->name;
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

        $this->rol->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'Rol actualizado exitosamente.');
        $this->modal = false;
    }
}
