@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-envelope me-2"></i> {{ __('Mensaje') }}
                </div>

                <div class="card-body">
                    <!-- Detalles del Mensaje -->
                    <div class="mb-4">
                        <h5>{{ $message->subject }}</h5>
                        <p class="text-muted">De: {{ $message->from }}</p>
                        <p class="text-muted">Fecha: {{ $message->date->format('d/m/Y H:i') }}</p>
                        <hr>
                        <p>{{ $message->body }}</p>
                    </div>

                    <!-- Formulario de Respuesta -->
                    <form method="POST" action="{{ route('messages.reply', $message->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="response" class="form-label">Respuesta</label>
                            <textarea id="response" class="form-control @error('response') is-invalid @enderror"
                                      name="response" rows="5" required
                                      placeholder="Escribe tu respuesta aquí"></textarea>
                            @error('response')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i> {{ __('Enviar Respuesta') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection