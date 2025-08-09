<?php

namespace App\Livewire\Usuarios;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class CambioPassword extends Component
{
    public $password_nueva;
    public $password_actual;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.usuarios.cambio-password');
    }

    public function cambiar()
    {
        try {
            $this->validate([
                'password_actual' => 'required|min:8',
                'password_nueva' => 'required|min:8'
            ]);

            if ($this->password_actual == $this->password_nueva) {
                session()->flash('error', 'La contraseña nueva no puede ser igual a la actual.');
                return;
            }

            if ($this->password_nueva == '12345678') {
                session()->flash('error', 'La contraseña nueva no puede ser igual a la inicial.');
                return;
            }

            if (Hash::check($this->password_actual, $this->user->password)) {
                $this->user->update([
                    'password' => $this->password_nueva
                ]);
                session()->flash('success', 'Contraseña actualizada exitosamente.');
                return redirect()->route('inicio');
            } else {

                session()->flash('error', 'La Contraseña no se actualizo.');
                return;
            }
        } catch (ValidationException $e) {
            session()->flash('error', 'Error de validación. Verifica los campos.');
        } catch (\Exception $e) {
            Log::error('Error al crear categoría: ' . $e->getMessage());
            session()->flash('error', 'Ocurrió un error inesperado al crear la categoría.');
        }
    }
}
