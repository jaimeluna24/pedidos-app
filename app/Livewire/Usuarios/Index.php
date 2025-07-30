<?php

namespace App\Livewire\Usuarios;

use App\Models\Usuario\Usuario;
use Livewire\Component;

class Index extends Component
{
    public $query = '';

    public function render()
    {
        $usuarios = Usuario::where('nombre_usuario', 'like', '%'.$this->query.'%')->with('roles')->paginate(10);

        return view('livewire.usuarios.index', ['usuarios' => $usuarios]);
    }
}
