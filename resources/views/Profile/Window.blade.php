
<div
    id="profile-menu"
    class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2"
>
    <!-- Opción: Editar Perfil -->
    <a
        href="{{ route('profile.edit') }}"
        class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600"
    >
        Editar Perfil
    </a>

    <!-- Opción: Cerrar Sesión -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button
            type="submit"
            class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600"
        >
            Cerrar Sesión
        </button>
    </form>

    <!-- Opción: Cerrar Menú -->
    <button
        id="close-menu-button"
        class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600"
    >
        Cerrar
    </button>
</div>