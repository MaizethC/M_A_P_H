<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Mostrar listado de usuarios
    public function index()
    {
        $users = User::all();
        return view('ListadoClientes.users', compact('users')); // Ajusta la ruta aquí
    }

    // Activar usuario
    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_active' => true]);

        return redirect()->route('users.index')
                         ->with('success', 'Usuario activado correctamente.');
    }

    // Desactivar usuario
    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_active' => false]);

        return redirect()->route('users.index')
                         ->with('success', 'Usuario desactivado correctamente.');
    }
}