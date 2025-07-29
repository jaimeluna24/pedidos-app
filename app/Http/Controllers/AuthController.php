<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

     /**
	* Función que muestra la vista de logados o la vista con el formulario de Login
	*/
	public function index()
	{
	    // Comprobamos si el usuario ya está logado
	    if (Auth::check()) {

	        // Si está logado le mostramos la vista de logados
	        return view('livewire.dashboard.dashboard');
	    }

	    // Si no está logado le mostramos la vista con el formulario de login
	    return view('auth.login');
	}

    public function loginUser(Request $request)
	{
	    // Comprobamos que el email y la contraseña han sido introducidos
	    $request->validate([
	        'nombre_usuario' => 'required',
	        'password' => 'required',
	    ]);

	    // Almacenamos las credenciales de email y contraseña
	    $credentials = $request->only('nombre_usuario', 'password');

	    // Si el usuario existe lo logamos y lo llevamos a la vista de "logados" con un mensaje
	    if (Auth::attempt($credentials)) {
	        return redirect()->intended('')
	            ->withSuccess('Logado Correctamente');
	    }

	    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
	    return redirect("/")->withSuccess('Los datos introducidos no son correctos');
	}
}
