<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Método para mostrar la vista de editar perfil
    public function edit()
    {
        return view('profile.edit'); // Retorna la vista de editar perfil
    }

    public function update(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    // Obtener el usuario autenticado
    $user = Auth::user();

    // Actualizar los datos del usuario
    $user->name = $request->name;
    $user->email = $request->email;

    // Actualizar la contraseña si se proporciona
    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

    // Guardar los cambios en la base de datos
    $user->save();

    // Redirigir a /lobby con un mensaje de éxito
    return redirect('/lobby')->with('success', 'Perfil actualizado exitosamente.');
}
}