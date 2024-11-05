@extends('layouts.app')

@section('content')
    <h3>Modificar Rol: {{ $roles->nombre }}</h3>
    <hr>

    <div class="card">
        <form action="{{ route('rol_actualizar', $roles->id_rol) }}" method="post">
            @csrf 
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
                <label for="nombre">Nombre del Rol:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $roles->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="descripccion">Descripción:</label>
                <textarea class="form-control" id="descripccion" name="descripccion" required>{{ old('descripccion', $roles->descripccion) }}</textarea>
            </div>

            <div class="form-group">
                <label for="activo">¿Está activo?</label>
                <select class="form-control" id="activo" name="activo" required>
                    <option value="1" {{ old('activo', $roles->activo) == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('activo', $roles->activo) == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('rol_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
