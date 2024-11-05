@extends('layouts.app')

@section('content')
    <h3>Modificar Asignación</h3>
    <hr>

    <div class="card">
        <form action="{{ route('usuario_area_rol_actualizar', $asignacion->id_usuario_area_rol) }}" method="post">
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
                <label for="id_usuario">Usuario:</label>
                <select class="form-select" id="id_usuario" name="id_usuario" required>
                    <option value="" disabled>Selecciona un Usuario...</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}"
                            {{ old('id_usuario', $asignacion->id_usuario) == $usuario->id_usuario ? 'selected' : '' }}>
                            {{ $usuario->nombre }} {{ $usuario->apellidoP }} {{ $usuario->apellidoM }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_area">Área:</label>
                <select class="form-select" id="id_area" name="id_area" required>
                    <option value="" disabled>Selecciona un Área...</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id_area }}"
                            {{ old('id_area', $asignacion->id_area) == $area->id_area ? 'selected' : '' }}>
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="id_rol">Rol:</label>
                <select class="form-select" id="id_rol" name="id_rol" required>
                    <option value="" disabled>Selecciona un Rol...</option>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id_rol }}"
                            {{ old('id_rol', $asignacion->id_rol) == $rol->id_rol ? 'selected' : '' }}>
                            {{ $rol->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_asignacion">Fecha de Asignación:</label>
                <input type="date" class="form-control" id="fecha_asignacion" name="fecha_asignacion"
                    value="{{ old('fecha_asignacion', $asignacion->fecha_asignacion->format('Y-m-d')) }}" required>
            </div>


            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('usuario_area_rol_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
