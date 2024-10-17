@extends('layouts.app')

@section('content')
    <h3>Nuevo Registro Histórico</h3>
    <hr>

    <div class="card">
        <form action="{{ route('historico_registrar') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="id_usuario_asigando">Usuario Asignado:</label>
                <input type="text" class="form-control" id="id_usuario_asigando" name="id_usuario_asigando" required>
            </div>
            <div class="form-group">
                <label for="id_tramite">ID del Trámite:</label>
                <input type="text" class="form-control" id="id_tramite" name="id_tramite" required>
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de Documento:</label>
                <input type="text" class="form-control" id="tipo_documento" name="tipo_documento" required>
            </div>
            <div class="form-group">
                <label for="valor_historico">Valor Histórico:</label>
                <textarea class="form-control" id="valor_historico" name="valor_historico" required></textarea>
            </div>
            <div class="form-group">
                <label for="acceso_publico">Acceso Público:</label>
                <select class="form-control" id="acceso_publico" name="acceso_publico" required>
                    <option value="" disabled selected>Seleccione una opción...</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="restricciones_acceso">Restricciones de Acceso:</label>
                <textarea class="form-control" id="restricciones_acceso" name="restricciones_acceso"></textarea>
            </div>
            <div class="form-group">
                <label for="documentos_adjuntos">Documentos Adjuntos:</label>
                <input type="file" class="form-control" id="documentos_adjuntos" name="documentos_adjuntos[]" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('historico_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
