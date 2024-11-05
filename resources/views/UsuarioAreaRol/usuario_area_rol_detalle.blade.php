@extends('layouts.app')

@section('content')
    <h3>Detalles de la Asignación</h3>
    <hr>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>ID de Asignación:</strong>
                    <p>{{ $asignacion->id_usuario_area_rol }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Usuario:</strong>
                    <p>{{ $asignacion->usuario->nombre }} {{ $asignacion->usuario->apellidoP }} {{ $asignacion->usuario->apellidoM }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Área:</strong>
                    <p>{{ $asignacion->area->nombre }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Rol:</strong>
                    <p>{{ $asignacion->rol->nombre }}</p>
                </div>

                <div class="col-md-4">
                    <strong>Fecha de Asignación:</strong>
                    <p>{{ \Carbon\Carbon::parse($asignacion->fecha_asignacion)->format('d-m-Y') }}</p>
                </div>
            </div>

            <a href="{{ route('usuario_area_rol_index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
@endsection
