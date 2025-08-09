<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

            return redirect()->intended('/inicio');
        }

        // Si no está logado le mostramos la vista con el formulario de login
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nombre_usuario', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Verificar si la contraseña es la predeterminada
            if (Hash::check('12345678', $user->password)) {
                return redirect()->intended('/cambiar-password')
                    ->withSuccess('Logado correctamente, cambie su contraseña.');
            }

            return redirect()->intended('/inicio')
                ->withSuccess('Logado correctamente');
        }

        return redirect("/")
            ->withErrors(['error' => 'Los datos introducidos no son correctos']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate(); // Se invalida la sesión
        $request->session()->regenerateToken(); // Se regenera el CSRF token

        return redirect('/'); // redireccion
    }
}
