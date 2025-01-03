<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Procesar el login
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Intentar autenticar al administrador
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // Redirigir a la vista "welcome"
            return redirect()->intended(route('welcome'));
        }
    
        // Si la autenticación falla, mostrar un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    // Cerrar sesión
    public function logout()
    {
        // Cerrar la sesión del administrador
        Auth::guard('admin')->logout();

        // Redirigir al formulario de login de admin
        return redirect()->route('admin.login');
    }
}
