<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class ProfileController extends Controller
{
    /**
     * Muestra el formulario para editar el perfil del administrador.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Obtener el administrador autenticado
        $admin = Auth::guard('admin')->user();

        // Retornar la vista de edición de perfil con los datos del administrador
        return view('profile.edit', compact('admin'));
    }

    /**
     * Actualiza el perfil del administrador.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . Auth::guard('admin')->id(),
            'password' => 'nullable|string|min:8|confirmed', // Validación para la contraseña
        ]);

        // Obtener el administrador autenticado
        $admin = Auth::guard('admin')->user();

        // Actualizar los datos del administrador
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Actualizar la contraseña si se proporciona
        if ($request->filled('password')) {
            $admin->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Redirigir al administrador con un mensaje de éxito
        return redirect()->route('profile.edit')->with('success', 'Perfil actualizado correctamente.');
    }
}