@extends('layouts.app')

@section('content')
    <h3>Nuevo Registro de Área</h3>
    <hr>

    <div class="card">
        <form action="{{ route('areas_registrar') }}" method="post">
            @csrf 

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
                <label for="nombre">Nombre del Área:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="descripccion">Descripción:</label>
                <textarea class="form-control" id="descripccion" name="descripccion" required>{{ old('descripccion') }}</textarea>
            </div>

            <div class="form-group">
                <label for="activo">¿Está activa?</label>
                <select class="form-control" id="activo" name="activo" required>
                    <option value="" disabled selected>Selecciona una opción...</option>
                    <option value="1" {{ old('activo') == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('activo') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('areas_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
