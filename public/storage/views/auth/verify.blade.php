@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    {{ __('Verifica tu Dirección de Correo Electrónico') }}
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.') }}
                        </div>
                    @endif

                    <p>
                        {{ __('Antes de continuar, por favor revisa tu correo electrónico para encontrar el enlace de verificación.') }}
                    </p>
                    <p>
                        {{ __('Si no recibiste el correo electrónico') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                {{ __('haz clic aquí para solicitar otro') }}
                            </button>.
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection