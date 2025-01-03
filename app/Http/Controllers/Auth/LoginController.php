<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/'; // Ruta de redirección después del login

    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    // Procesar el login
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->intended(route('lobby'));
        }

        // Si la autenticación falla, mostrar un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }
}