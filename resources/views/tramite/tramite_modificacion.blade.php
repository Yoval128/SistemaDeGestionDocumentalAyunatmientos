@extends('layouts.app')

@section('content')
    <h3>Editar Trámite</h3>
    <hr>

    <div class="card">
        <form action="{{ route('tramite_actualizar', $tramite->id_tramite) }}" method="post" enctype="multipart/form-data">
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
                <label for="id_area">Área:</label>
                <input type="text" class="form-control" id="id_area" name="id_area"
                    value="{{ old('id_area', $tramite->id_area) }}" required>
            </div>

            <div class="form-group">
                <label for="id_usuario">Usuario:</label>
                <select class="form-select" id="id_usuario" name="id_usuario" required>
                    <option value="" disabled>Selecciona una opción...</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}"
                            {{ $tramite->id_usuario == $usuario->id_usuario ? 'selected' : '' }}>
                            {{ $usuario->nombre }} {{ $usuario->apellidoP }} {{ $usuario->apellidoM }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"
                    value="{{ old('fecha_inicio', $tramite->fecha_inicio) }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_limite">Fecha Límite:</label>
                <input type="date" class="form-control" id="fecha_limite" name="fecha_limite"
                    value="{{ old('fecha_limite', $tramite->fecha_limite) }}" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="" disabled>Seleccione un estado...</option>
                    <option value="Pendiente" {{ $tramite->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En Proceso" {{ $tramite->estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                    <option value="Finalizado" {{ $tramite->estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones:</label>
                <textarea class="form-control" id="observaciones" name="observaciones">{{ old('observaciones', $tramite->observaciones) }}</textarea>
            </div>
            <div class="form-group">
                <label for="documentos_adjuntos">Documentos Adjuntos:</label>
                <input type="file" class="form-control" id="documentos_adjuntos" name="documentos_adjuntos[]" multiple>
                <small class="form-text text-muted">Deja vacío si no deseas cambiar los documentos adjuntos.</small>
            </div>

            <div class="form-group">
                <label>Documentos Existentes:</label>
                <ul>
                    @foreach (json_decode($tramite->documentos_adjuntos, true) as $key => $documento)
                        <li>
                            <a href="{{ asset('pdfs/' . $documento) }}" target="_blank">{{ $documento }}</a>
                            <input type="checkbox" name="documentos_a_eliminar[]" value="{{ $key }}"> Eliminar
                        </li>
                    @endforeach
                </ul>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('tramite_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
@endsection
