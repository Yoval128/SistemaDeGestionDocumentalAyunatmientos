@extends('layouts.app')

@section('content')
    <h3>Detalles del Usuario</h3>
    <hr>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="col-md-4">
                        <strong>Foto:</strong>
                        <p>
                            <img src="{{ url('/img/' . $usuario->foto) }}" style="width: 100px; height:100px;"> <br>
                            {{--    {{ url('img/' . $usuario->foto) }} <br><br> --}}
                        </p>
                    </div>
                    <strong>Nombre:</strong>
                    <p>{{ $usuario->nombre }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Apellidos:</strong>
                    <p>{{ $usuario->apellidoP . ' ' . $usuario->apellidoM }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Sexo:</strong>
                    <p>{{ $usuario->sexo == 'M' ? 'Masculino' : 'Femenino' }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Fecha de Nacimiento:</strong>
                    <p>{{ \Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Email:</strong>
                    <p>{{ $usuario->email }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Rol:</strong>
                    <p>{{ $usuario->rol }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Estado:</strong>
                    <p>{{ $usuario->activo ? 'Activo' : 'Inactivo' }}</p>
                </div>

            </div>

            <a href="{{ route('usuario_index') }}" class="btn btn-secondary">Regresar</a>

        </div>
    </div>
@endsection
