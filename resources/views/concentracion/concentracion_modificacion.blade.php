@extends('layouts.app')

@section('content')
    <h3>Modificar Registro de Concentración</h3>
    <hr>

    <form action="{{ route('concentracion_actualizar', $concentracion->id_concentracion) }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')


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
            <label for="clave">Clave:</label>
            <input type="text" class="form-control @error('clave') is-invalid_concentracion @enderror"
                id_concentracion="clave" name="clave" value="{{ old('clave', $concentracion->clave) }}" required>
            @error('clave')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombre_expediente">Nombre del Expediente:</label>
            <input type="text" class="form-control @error('nombre_expediente') is-invalid_concentracion @enderror"
                id_concentracion="nombre_expediente" name="nombre_expediente"
                value="{{ old('nombre_expediente', $concentracion->nombre_expediente) }}" required>
            @error('nombre_expediente')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fondo">Fondo:</label>
            <input type="text" class="form-control" id_concentracion="fondo" name="fondo"
                value="{{ $concentracion->fondo }}" required>
        </div>

        <div class="form-group">
            <label for="seccion">Sección:</label>
            <input type="text" class="form-control @error('seccion') is-invalid_concentracion @enderror"
                id_concentracion="seccion" name="seccion" value="{{ old('seccion', $concentracion->seccion) }}" required>
            @error('seccion')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="subseccion">Subsección:</label>
            <input type="text" class="form-control" id_concentracion="subseccion" name="subseccion"
                value="{{ old('subseccion', $concentracion->subseccion) }}">
        </div>

        <div class="form-group">
            <label for="serie">Serie:</label>
            <input type="text" class="form-control @error('serie') is-invalid_concentracion @enderror"
                id_concentracion="serie" name="serie" value="{{ old('serie', $concentracion->serie) }}" required>
            @error('serie')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="subserie">Subserie:</label>
            <input type="text" class="form-control @error('subserie') is-invalid_concentracion @enderror"
                id_concentracion="subserie" name="subserie" value="{{ old('subserie', $concentracion->subserie) }}"
                required>
            @error('subserie')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ano_creacion">Año de Creación:</label>
            <input type="date" class="form-control @error('ano_creacion') is-invalid_concentracion @enderror"
                id_concentracion="ano_creacion" name="ano_creacion"
                value="{{ old('ano_creacion', $concentracion->ano_creacion) }}" required>
            @error('ano_creacion')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ano_cierre">Año de Cierre:</label>
            <input type="date" class="form-control @error('ano_cierre') is-invalid_concentracion @enderror"
                id_concentracion="ano_cierre" name="ano_cierre" value="{{ old('ano_cierre', $concentracion->ano_cierre) }}"
                required>
            @error('ano_cierre')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="motivo_cierre">Motivo de Cierre:</label>
            <input type="text" class="form-control @error('motivo_cierre') is-invalid_concentracion @enderror"
                id_concentracion="motivo_cierre" name="motivo_cierre"
                value="{{ old('motivo_cierre', $concentracion->motivo_cierre) }}" required>
            @error('motivo_cierre')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="legajos">Legajos:</label>
            <input type="number" class="form-control @error('legajos') is-invalid_concentracion @enderror"
                id_concentracion="legajos" name="legajos" value="{{ old('legajos', $concentracion->legajos) }}"
                min="1" required>
            @error('legajos')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="medida">medida:</label>
            <input type="number" step="0.01" class="form-control @error('medida') is-invalid_concentracion @enderror"
                id_concentracion="medida" name="medida" value="{{ old('medida', $concentracion->medida) }}" required>
            @error('medida')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ubicacion_fisica">Ubicación Física:</label>
            <select class="form-control @error('ubicacion_fisica') is-invalid_concentracion @enderror"
                id_concentracion="ubicacion_fisica" name="ubicacion_fisica" required>
                <option value="">Selecciona una opción</option>
                @foreach (range('A', 'Z') as $letra)
                    @foreach (range(1, 10) as $numero)
                        <option value="{{ $letra }}-{{ $numero }}"
                            {{ old('ubicacion_fisica', $concentracion->ubicacion_fisica) == "{$letra}-{$numero}" ? 'selected' : '' }}>
                            {{ $letra }}-{{ $numero }}</option>
                    @endforeach
                @endforeach
            </select>
            @error('ubicacion_fisica')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="digitalizado">Digitalizado:</label>
            <select class="form-control @error('digitalizado') is-invalid_concentracion @enderror"
                id_concentracion="digitalizado" name="digitalizado" required>
                <option value="1" {{ old('digitalizado', $concentracion->digitalizado) == '1' ? 'selected' : '' }}>Sí
                </option>
                <option value="0" {{ old('digitalizado', $concentracion->digitalizado) == '0' ? 'selected' : '' }}>No
                </option>
            </select>
            @error('digitalizado')
                <div class="invalid_concentracion-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="form-group">
            <label for="archivo_pdf">Documentos Adjuntos:</label>
            <input type="file" class="form-control" id_concentracion="archivo_pdf" name="archivo_pdf[]" multiple>
        </div>

        <div class="form-group">
            <label>Documentos Existentes:</label>
            <ul>
                @foreach (json_decode($concentracion->archivo_pdf, true) as $key => $documento)
                    <li>
                        <a href="{{ asset('pdfs/' . $documento) }}" target="_blank">{{ $documento }}</a>
                        <input type="checkbox" name="documentos_a_eliminar[]" value="{{ $key }}"> Eliminar
                    </li>
                @endforeach
            </ul>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        
        <a href="{{ route('concentracion_index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
