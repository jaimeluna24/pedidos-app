<?php

namespace App\Livewire;

use Livewire\Component;

class Loader extends Component
{
     public $mensaje = 'Cargando...';

    public function render()
    {
        return view('livewire.loader');
    }
}
