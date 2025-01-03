@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    {{ __('Editar Perfil') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Campo de Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input
                                id="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ Auth::user()->name }}"
                                required
                                autocomplete="name"
                                autofocus
                                placeholder="Ingresa tu nombre"
                            >
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo de Correo Electrónico -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ Auth::user()->email }}"
                                required
                                autocomplete="email"
                                placeholder="Ingresa tu correo electrónico"
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo de Nueva Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva Contraseña (opcional)</label>
                            <input
                                id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                autocomplete="new-password"
                                placeholder="Ingresa tu nueva contraseña"
                            >
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Campo de Confirmación de Nueva Contraseña -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirmar Nueva Contraseña</label>
                            <input
                                id="password-confirm"
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                autocomplete="new-password"
                                placeholder="Confirma tu nueva contraseña"
                            >
                        </div>

                        <!-- Botón de Guardar Cambios -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Guardar Cambios') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection