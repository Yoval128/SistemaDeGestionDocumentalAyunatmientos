@extends('layouts.app')

@section('content')
    <h3>Modificar Usuario</h3>
    <hr>

    <div class="card">
        <form action="{{ route('usuario_actualizar', $usuario->id_usuario) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }} <!-- Asegúrate de usar el método PUT para actualizar -->

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required>
            </div>
            <div class="form-group">
                <label for="apellidoP">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apellidoP" name="apellidoP" value="{{ old('apellidoP', $usuario->apellidoP) }}" required>
            </div>
            <div class="form-group">
                <label for="apellidoM">Apellido Materno:</label>
                <input type="text" class="form-control" id="apellidoM" name="apellidoM" value="{{ old('apellidoM', $usuario->apellidoM) }}" required>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="" disabled>Seleccione...</option>
                    <option value="M" {{ old('sexo', $usuario->sexo) == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ old('sexo', $usuario->sexo) == 'F' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $usuario->email) }}" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Dejar vacío si no deseas cambiarla">
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select class="form-control" id="rol" name="rol" required>
                    <option value="" disabled>Seleccione un rol...</option>
                    <option value="Jefe de archivo general" {{ old('rol', $usuario->rol) == 'Jefe de archivo general' ? 'selected' : '' }}>Jefe de archivo general</option>
                    <option value="Empleado de trámite" {{ old('rol', $usuario->rol) == 'Empleado de trámite' ? 'selected' : '' }}>Empleado de trámite</option>
                    <option value="Empleado de concentración" {{ old('rol', $usuario->rol) == 'Empleado de concentración' ? 'selected' : '' }}>Empleado de concentración</option>
                    <option value="Empleado de histórico" {{ old('rol', $usuario->rol) == 'Empleado de histórico' ? 'selected' : '' }}>Empleado de histórico</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto">
                <small>Dejar vacío si no deseas cambiar la foto actual.</small>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="activo" id="activo" value="1"
                    {{ old('activo', $usuario->activo) ? 'checked' : '' }}>
                <label class="form-check-label" for="activo">Activo</label>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('usuario_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
