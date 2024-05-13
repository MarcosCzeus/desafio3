@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil de Usuario</div>

                <div class="card-body">
                    @if($employee)
                        <p>Nombre: {{ $employee->first_name }} {{ $employee->last_name }}</p>
                        <p>Email: {{ $employee->email }}</p>
                        <p>Cargo: {{ $employee->position }}</p>
                        <p>Salario: {{ $employee->salary }}</p>
                        @if($employee->photo)
                            <p>Foto:</p>
                            <img src="{{ asset('storage/photos/' . $employee->photo) }}" alt="Foto del empleado" style="max-width: 200px; height: auto;">
                        @endif
                        <!-- Agrega otros campos según sea necesario -->
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <p>No se encontraron datos del empleado.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
