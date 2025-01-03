@extends('layouts.app2')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Editar Perfil</h1>

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campo para el nombre -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', Auth::guard('admin')->user()->name) }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo para el correo electrónico -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', Auth::guard('admin')->user()->email) }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo para la contraseña -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-bold mb-2">Nueva Contraseña</label>
            <input
                type="password"
                name="password"
                id="password"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo para confirmar la contraseña -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmar Contraseña</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <!-- Botón para guardar cambios -->
        <div class="mt-6">
            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                Guardar Cambios
            </button>
        </div>
    </form>
</div>


<script>
  // Obtener elementos del DOM
  const profileMenuButton = document.getElementById('profile-menu-button');
  const profileMenu = document.getElementById('profile-menu');
  const closeMenuButton = document.getElementById('close-menu-button');

  // Mostrar/ocultar el menú al hacer clic en el círculo del perfil
  profileMenuButton.addEventListener('click', () => {
    profileMenu.classList.toggle('hidden');
  });

  // Ocultar el menú al hacer clic en "Cerrar"
  closeMenuButton.addEventListener('click', () => {
    profileMenu.classList.add('hidden');
  });

  // Ocultar el menú al hacer clic fuera de él
  document.addEventListener('click', (event) => {
    if (
      !profileMenu.contains(event.target) &&
      !profileMenuButton.contains(event.target)
    ) {
      profileMenu.classList.add('hidden');
    }
  });
</script>
@endsection

