<?php

namespace App\Livewire\Usuarios;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\Usuario\Departamento;
use App\Models\Usuario\Usuario;
use Spatie\Permission\Models\Permission;

class Crear extends Component
{
    public $dni;
    public $email;
    public $nombre;
    public $apellido;
    public $nombre_usuario;
    public $telefono;
    public $departamento_id = 'Seleccione';
    public $role_id = 'Seleccione';
    public $permisos_seleccionados = [];

    public function render()
    {
        $departamentos = Departamento::all();
        $roles = Role::all();
        $permisos = Permission::all();
        return view('livewire.usuarios.crear', ['departamentos' => $departamentos, 'roles' => $roles, 'permisos' => $permisos]);
    }

    public function crear()
    {
        // dd($this->permisos_seleccionados);
        $this->validate([
            'dni' => 'required|string|unique:users,dni',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'nombre_usuario' => 'required|string|unique:users,nombre_usuario',
            'telefono' => 'required|string|unique:users,telefono',
        ]);

        $user = Usuario::create([
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
        $user->assignRole($rol);
        $user->givePermissionTo($this->permisos_seleccionados);

        redirect()->route('usuarios.index');
        session()->flash('success', 'Usuario creado exitosamente.');
    }
}
