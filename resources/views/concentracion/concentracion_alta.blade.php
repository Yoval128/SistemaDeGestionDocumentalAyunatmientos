@extends('layouts.app')

@section('content')
    <h3>Nuevo Registro de Concentración</h3>
    <hr>

    <div class="card">
        <form action="{{ route('concentracion_registrar') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="clave">Clave:</label>
                <input type="text" class="form-control" id="clave" name="clave" required>
            </div>
            
            <div class="form-group">
                <label for="nombre_expediente">Nombre del Expediente:</label>
                <input type="text" class="form-control" id="nombre_expediente" name="nombre_expediente" required>
            </div>
            
            <div class="form-group">
                <label for="fondo">Fondo:</label>
                <input type="text" class="form-control" id="fondo" name="fondo" required>
            </div>
            
            <div class="form-group">
                <label for="seccion">Sección:</label>
                <input type="text" class="form-control" id="seccion" name="seccion" required>
            </div>
            
            <div class="form-group">
                <label for="subseccion">Subsección:</label>
                <input type="text" class="form-control" id="subseccion" name="subseccion">
            </div>
            
            <div class="form-group">
                <label for="ano_creacion">Año de Creación:</label>
                <input type="number" class="form-control" id="ano_creacion" name="ano_creacion" required>
            </div>
            
            <div class="form-group">
                <label for="ano_cierre">Año de Cierre:</label>
                <input type="number" class="form-control" id="ano_cierre" name="ano_cierre">
            </div>
            
            <div class="form-group">
                <label for="notas">Notas Adicionales:</label>
                <textarea class="form-control" id="notas" name="notas"></textarea>
            </div>
            
            <div class="form-group">
                <label for="documentos_adjuntos">Documentos Adjuntos:</label>
                <input type="file" class="form-control" id="documentos_adjuntos" name="documentos_adjuntos[]" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('concentracion_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
