@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-users me-2"></i> {{ __('Gestión de Usuarios') }}
                </div>

                <div class="card-body">
                    <!-- Barra de Búsqueda -->
                    <div class="mb-4">
                        <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre...">
                    </div>

                    <!-- Tabla de Usuarios -->
                    <div class="table-responsive">
                        <table class="table table-hover" id="usersTable">
                            <thead>
                                <tr>
                                    <th>Nombre Completo</th>
                                    <th>Correo Electrónico</th>
                                    <th>Tipo de Suscripción</th>
                                    <th>Inicio de Suscripción</th>
                                    <th>Fin de Suscripción</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->subscription_type ?? 'Sin suscripción' }}</td>
                                        <td>{{ $user->subscription_start ? $user->subscription_start->format('d/m/Y') : 'N/A' }}</td>
                                        <td>{{ $user->subscription_end ? $user->subscription_end->format('d/m/Y') : 'N/A' }}</td>
                                        <td>
                                            @if ($user->is_active)
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->is_active)
                                                <form action="{{ route('users.deactivate', $user->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-times-circle me-1"></i> Desactivar
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('users.activate', $user->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        <i class="fas fa-check-circle me-1"></i> Activar
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para Filtrado en Tiempo Real -->
<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#usersTable tbody tr');

        rows.forEach(row => {
            const name = row.querySelector('td').textContent.toLowerCase();
            if (name.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection