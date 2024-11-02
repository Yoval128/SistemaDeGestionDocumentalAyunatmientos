@extends('layouts.app')

@section('content')
    <h3>Modificar Registro Histórico</h3>
    <hr>

    <div class="card">
        <form action="{{ route('historico_actualizar', $historico->id_historico) }}" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="id_usuario_asigando">Usuario Asignado:</label>
                <select class="form-select" id="id_usuario_asigando" name="id_usuario_asigando" required>
                    <option value="" disabled>Selecciona una opción...</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}"
                            {{ $historico->id_usuario_asigando == $usuario->id_usuario ? 'selected' : '' }}>
                            {{ $usuario->nombre }} {{ $usuario->apellidoP }} {{ $usuario->apellidoM }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_tramite">ID del Trámite:</label>
                <input type="text" class="form-control" id="id_tramite" name="id_tramite"
                    value="{{ $historico->id_tramite }}" required required pattern="\d*" title="Solo se permiten números">
            </div>

            <div class="form-group">
                <label for="tipo_documento">Tipo de Documento:</label>
                <input type="text" class="form-control" id="tipo_documento" name="tipo_documento"
                    value="{{ $historico->tipo_documento }}" required>
            </div>
            <div class="form-group">
                <label for="valor_historico">Valor Histórico:</label>
                <textarea class="form-control" id="valor_historico" name="valor_historico" required>{{ $historico->valor_historico }}</textarea>
            </div>
            <div class="form-group">
                <label for="acceso_publico">Acceso Público:</label>
                <select class="form-control" id="acceso_publico" name="acceso_publico" required>
                    <option value="1" {{ $historico->acceso_publico ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ !$historico->acceso_publico ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="restricciones_acceso">Restricciones de Acceso:</label>
                <textarea class="form-control" id="restricciones_acceso" name="restricciones_acceso">{{ $historico->restricciones_acceso }}</textarea>
            </div>

            <div class="form-group">
                <label for="documentos_adjuntos">Documentos Adjuntos:</label>
                <input type="file" class="form-control" id="documentos_adjuntos" name="documentos_adjuntos[]" multiple>
                <small class="form-text text-muted">Deja vacío si no deseas cambiar los documentos adjuntos.</small>
            </div>

            <div class="form-group">
                <label>Documentos Existentes:</label>
                <ul>
                    @foreach (json_decode($historico->documentos_adjuntos, true) as $key => $documento)
                        <li>
                            <a href="{{ asset('pdfs/' . $documento) }}" target="_blank">{{ $documento }}</a>
                            <input type="checkbox" name="documentos_a_eliminar[]" value="{{ $key }}"> Eliminar
                        </li>
                    @endforeach
                </ul>
            </div>


            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('historico_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
