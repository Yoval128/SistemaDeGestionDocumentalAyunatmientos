@extends('layouts.app')

@section('content')
    <h3>Detalles de la Concentración</h3>
    <hr>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>ID de la Concentración:</strong>
                    <p>{{ $concentracion->id_concentracion }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Clave:</strong>
                    <p>{{ $concentracion->clave }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Nombre del Expediente:</strong>
                    <p>{{ $concentracion->nombre_expediente }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Fondo:</strong>
                    <p>{{ $concentracion->fondo }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Sección:</strong>
                    <p>{{ $concentracion->seccion }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Subsección:</strong>
                    <p>{{ $concentracion->subseccion }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Año de Creación:</strong>
                    <p>{{ $concentracion->ano_creacion }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Año de Cierre:</strong>
                    <p>{{ $concentracion->ano_cierre }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Notas Adicionales:</strong>
                    <p>{{ $concentracion->notas ?? 'No hay notas adicionales.' }}</p>
                </div>
            </div>

            <a href="{{ route('concentracion_index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
@endsection
