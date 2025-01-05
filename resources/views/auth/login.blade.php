@extends('layouts.app')

<!-- Comienza el estilo -->
@push('styles')
<style>
    /* Barra de Navegación */
    nav.navbar {
        padding: 0.2rem 0.2rem; 
        width: 100%;
        max-width: 100%;
        margin: 0 auto;
        box-sizing: border-box;
        background-color: #2c3e50; /* Fondo oscuro */
        background: linear-gradient(135deg,rgb(255, 255, 255),rgb(255, 255, 255)); /* Fondo degradado */
        color: #fff;
    }

    .navbar-nav {
        display: flex;
        justify-content: space-between;
        background: linear-gradient(135deg,rgb(91, 63, 168),rgb(180, 39, 39)); /* Fondo degradado */
        color: #fff;
    }

    .navbar-toggler {
        padding: 0.25rem 0.5rem;
        font-size: 1rem;
        background: linear-gradient(135deg,rgb(255, 255, 255),rgb(28, 196, 98)); /* Fondo degradado */
        color: #fff;
    }

    /* Fondo y contenedor principal */
    .container {
        /*display: flex;*/
        justify-content: center;
        align-items: center;
        min-height: 10vh;
        background: linear-gradient(135deg,rgb(255, 255, 255),rgb(255, 255, 255)); /* Fondo degradado */
        color: #fff;
    }

    /* Tarjeta de login */
    .card {
        border: none;
        border-radius: 15px;
        background: linear-gradient(135deg, #2980b9, #8e44ad); /* Fondo claro con un toque moderno */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transform: translateY(-100px);
        animation: slideIn 0.8s ease forwards;
        width: 100%;
        max-width: 400px;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-100px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .card-body {
        padding: 2rem;
    }

    .card-title {
        color:rgb(243, 96, 157);
        font-weight: bold;
        text-align: center;
        font-size: 2rem;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
    }

    /* Estilo de los inputs */
    .form-control {
        border-radius: 10px;
        border: 1px solid #2980b9;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 10px rgba(235, 16, 118, 0.5);
        border-color:rgb(233, 32, 132);
    }

    .form-control:invalid {
        border-color: #e74c3c;
    }

    /* Estilo del botón */
    .btn-primary {
        background: linear-gradient(135deg,rgb(228, 123, 175), #8e44ad);
        border: none;
        border-radius: 25px;
        padding: 10px;
        font-size: 1.1rem;
        font-weight: bold;
        letter-spacing: 1px;
        transition: transform 0.3s ease;
        width: 100%;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #8e44ad, #2980b9);
        transform: scale(1.05);
    }

    /* Enlace de recuperación */
    a {
        color:rgb(214, 11, 55);
        text-decoration: none;
        transition: color 0.3s ease;
        text-align: center;
        display: block;
        margin-top: 1rem;
    }

    a:hover {
        text-decoration: underline;
        color:rgb(212, 227, 236);
    }

    /* Adaptabilidad en pantallas pequeñas */
    @media (max-width: 576px) {
        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.5rem;
        }

        .btn-primary {
            font-size: 1rem;
        }
    }

</style>
@endpush
<!-- Finaliza el estilo -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Campo de Correo Electrónico -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="Ingresa tu correo electrónico">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

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

                        <!-- Checkbox "Recordarme" -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Recordarme
                            </label>
                        </div>

                        <!-- Botón de Iniciar Sesión -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">
                                Iniciar Sesión
                            </button>
                        </div>

                        <!-- Enlace para Recuperar Contraseña -->
                        @if (Route::has('password.request'))
                            <div class="text-center">
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    ¿Olvidaste tu contraseña?
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