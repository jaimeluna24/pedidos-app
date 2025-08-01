<?php

namespace App\Livewire\Usuarios;

use App\Models\Usuario\Usuario;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\Usuario\Departamento;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class Detalles extends Component
{
    public $id;
    public $modo_vista = true;
    public $dni;
    public $email;
    public $nombre;
    public $apellido;
    public $nombre_usuario;
    public $telefono;
    public $departamento_id = 'Seleccione';
    public $role_id = 'Seleccione';
    public $permisos_seleccionados = [];
    public $usuario;

    public function mount($id)
    {
        $this->id = $id;
        $usuario = Usuario::find($this->id);

        $this->usuario = $usuario;

        $this->dni = $usuario->dni;
        $this->email = $usuario->email;
        $this->nombre = $usuario->nombre;
        $this->apellido = $usuario->apellido;
        $this->nombre_usuario = $usuario->nombre_usuario;
        $this->telefono = $usuario->telefono;
        $this->departamento_id = $usuario->departamento_id;
        $this->role_id = $usuario->roles[0]->id;
        $this->permisos_seleccionados = $usuario->getPermissionNames()->toArray();
    }
    public function render()
    {
        $departamentos = Departamento::all();
        $roles = Role::all();
        $permisos = Permission::all();


        return view('livewire.usuarios.detalles', ['departamentos' => $departamentos, 'roles' => $roles, 'permisos' => $permisos]);
    }

    public function editar()
    {
        $this->validate([
            'dni' => ['required', 'string', Rule::unique('users', 'dni')->ignore($this->usuario->id)],
            'nombre' => ['required', 'string'],
            'apellido' => ['required', 'string'],
            'email' => ['required', 'string', Rule::unique('users', 'email')->ignore($this->usuario->id)],
            'nombre_usuario' => ['required', 'string', Rule::unique('users', 'nombre_usuario')->ignore($this->usuario->id)],
            'telefono' => ['required', 'string', Rule::unique('users', 'telefono')->ignore($this->usuario->id)],
        ]);

        $this->usuario->update([
            'dni' => $this->dni,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'email' => $this->email,
            'nombre_usuario' => $this->nombre_usuario,
            'telefono' => $this->telefono,
            'password' => '12345678',
            'departamento_id' => $this->departamento_id,
        ]);

        $rol = Role::find((int) $this->role_id);
        $this->usuario->assignRole($rol);
        $this->usuario->givePermissionTo($this->permisos_seleccionados);

        $this->modo_vista = true;

        session()->flash('success', 'Usuario editado exitosamente.');
    }

    public function eliminar()
    {
        $this->usuario->delete();

        redirect()->route('usuarios.index');
        session()->flash('success', 'Usuario eliminado exitosamente.');
    }
}
