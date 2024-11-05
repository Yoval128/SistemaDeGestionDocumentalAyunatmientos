@extends('layouts.app')

@section('content')
    <h3>Detalles del Área</h3>
    <hr>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>ID del Área:</strong>
                    <p>{{ $areas->id_area }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Nombre del Área:</strong>
                    <p>{{ $areas->nombre }}</p> 
                </div>
                <div class="col-md-4">
                    <strong>Estado:</strong>
                    <p>{{ $areas->activo ? 'Activo' : 'Inactivo' }}</p> 
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Descripción:</strong>
                    <p>{{ $areas->descripccion }}</p> 
                </div>
            </div>

            <a href="{{ route('areas_index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
@endsection
