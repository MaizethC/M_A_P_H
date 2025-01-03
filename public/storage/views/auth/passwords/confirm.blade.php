@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    {{ __('Confirmar Contraseña') }}
                </div>

                <div class="card-body">
                    <p class="mb-3">
                        {{ __('Por favor, confirma tu contraseña antes de continuar.') }}
                    </p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <!-- Campo de Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password"
                                   placeholder="Ingresa tu contraseña">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Botón de Confirmar Contraseña -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirmar Contraseña') }}
                            </button>
                        </div>

                        <!-- Enlace para Recuperar Contraseña -->
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection