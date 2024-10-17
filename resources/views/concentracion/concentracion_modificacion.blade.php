@extends('layouts.app')

@section('content')
    <h3>Modificar Registro de Concentración</h3>
    <hr>

    <div class="card">
        <form action="{{ route('concentracion_actualizar', ['id' => $concentracion->id_concentracion]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            
            <div class="form-group">
                <label for="clave">Clave:</label>
                <input type="text" class="form-control" id="clave" name="clave" value="{{ $concentracion->clave }}" required>
            </div>
            
            <div class="form-group">
                <label for="nombre_expediente">Nombre del Expediente:</label>
                <input type="text" class="form-control" id="nombre_expediente" name="nombre_expediente" value="{{ $concentracion->nombre_expediente }}" required>
            </div>
            
            <div class="form-group">
                <label for="fondo">Fondo:</label>
                <input type="text" class="form-control" id="fondo" name="fondo" value="{{ $concentracion->fondo }}" required>
            </div>
            
            <div class="form-group">
                <label for="seccion">Sección:</label>
                <input type="text" class="form-control" id="seccion" name="seccion" value="{{ $concentracion->seccion }}" required>
            </div>
            
            <div class="form-group">
                <label for="subseccion">Subsección:</label>
                <input type="text" class="form-control" id="subseccion" name="subseccion" value="{{ $concentracion->subseccion }}">
            </div>
            
            <div class="form-group">
                <label for="ano_creacion">Año de Creación:</label>
                <input type="number" class="form-control" id="ano_creacion" name="ano_creacion" value="{{ $concentracion->ano_creacion }}" required>
            </div>
            
            <div class="form-group">
                <label for="ano_cierre">Año de Cierre:</label>
                <input type="number" class="form-control" id="ano_cierre" name="ano_cierre" value="{{ $concentracion->ano_cierre }}">
            </div>
            
            <div class="form-group">
                <label for="notas">Notas Adicionales:</label>
                <textarea class="form-control" id="notas" name="notas">{{ $concentracion->notas }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="documentos_adjuntos">Documentos Adjuntos:</label>
                <input type="file" class="form-control" id="documentos_adjuntos" name="documentos_adjuntos[]" multiple>
                <small class="form-text text-muted">Puedes subir nuevos documentos si lo deseas.</small>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('concentracion_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
