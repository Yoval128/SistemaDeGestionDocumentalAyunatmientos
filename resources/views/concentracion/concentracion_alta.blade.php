@extends('layouts.app')

@section('content')
    <h3>Nuevo Registro de Concentración</h3>
    <hr>

    <form action="{{ route('concentracion_registrar') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

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
            <input type="text" class="form-control @error('clave') is-invalid @enderror" id="clave" name="clave" value="{{ old('clave') }}" required>
            @error('clave')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombre_expediente">Nombre del Expediente:</label>
            <input type="text" class="form-control @error('nombre_expediente') is-invalid @enderror" id="nombre_expediente" name="nombre_expediente" value="{{ old('nombre_expediente') }}" required>
            @error('nombre_expediente')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fondo">Fondo:</label>
            <input type="text" class="form-control" id="fondo" name="fondo" value="Ayuntamiento" required>
        </div>

        <div class="form-group">
            <label for="seccion">Sección:</label>
            <input type="text" class="form-control @error('seccion') is-invalid @enderror" id="seccion" name="seccion" value="{{ old('seccion') }}" required>
            @error('seccion')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="subseccion">Subsección:</label>
            <input type="text" class="form-control" id="subseccion" name="subseccion" value="{{ old('subseccion') }}">
        </div>

        <div class="form-group">
            <label for="serie">Serie:</label>
            <input type="text" class="form-control @error('serie') is-invalid @enderror" id="serie" name="serie" value="{{ old('serie') }}" required>
            @error('serie')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="subserie">Subserie:</label>
            <input type="text" class="form-control @error('subserie') is-invalid @enderror" id="subserie" name="subserie" value="{{ old('subserie') }}" required>
            @error('subserie')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ano_creacion">Año de Creación:</label>
            <input type="date" class="form-control @error('ano_creacion') is-invalid @enderror" id="ano_creacion" name="ano_creacion" value="{{ old('ano_creacion') }}" required>
            @error('ano_creacion')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ano_cierre">Año de Cierre:</label>
            <input type="date" class="form-control @error('ano_cierre') is-invalid @enderror" id="ano_cierre" name="ano_cierre" value="{{ old('ano_cierre') }}" required>
            @error('ano_cierre')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="motivo_cierre">Motivo de Cierre:</label>
            <input type="text" class="form-control @error('motivo_cierre') is-invalid @enderror" id="motivo_cierre" name="motivo_cierre" value="{{ old('motivo_cierre') }}" required>
            @error('motivo_cierre')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="legajos">Legajos:</label>
            <input type="number" class="form-control @error('legajos') is-invalid @enderror" id="legajos" name="legajos" value="{{ old('legajos', 1) }}" min="1" required>
            @error('legajos')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="medida">Medida:</label>
            <input type="number" step="0.01" class="form-control @error('medida') is-invalid @enderror" id="medida" name="medida" value="{{ old('medida', 2.5) }}" required>
            @error('medida')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ubicacion_fisica">Ubicación Física:</label>
            <select class="form-control @error('ubicacion_fisica') is-invalid @enderror" id="ubicacion_fisica" name="ubicacion_fisica" required>
                <option value="">Selecciona una opción</option>
                @foreach (range('A', 'Z') as $letra)
                    @foreach (range(1, 10) as $numero)
                        <option value="{{ $letra }}-{{ $numero }}" {{ old('ubicacion_fisica') == "{$letra}-{$numero}" ? 'selected' : '' }}>{{ $letra }}-{{ $numero }}</option>
                    @endforeach
                @endforeach
            </select>
            @error('ubicacion_fisica')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="digitalizado">Digitalizado:</label>
            <select class="form-control @error('digitalizado') is-invalid @enderror" id="digitalizado" name="digitalizado" required>
                <option value="1" {{ old('digitalizado') == '1' ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('digitalizado') == '0' ? 'selected' : '' }}>No</option>
            </select>
            @error('digitalizado')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="archivo_pdf">Documentos Adjuntos:</label>
            <input type="file" class="form-control" id="archivo_pdf" name="archivo_pdf[]" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('concentracion_index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
