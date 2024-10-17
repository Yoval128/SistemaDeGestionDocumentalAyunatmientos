@extends('layouts.app')

@section('content')
    <h3>Nuevo Usuario</h3>
    <hr>

    <div class="card">
            <form action="{{ route('usuario_registrar') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apellidoP" name="apellidoP" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido Materno:</label>
                <input type="text" class="form-control" id="apellidoM" name="apellidoM" required>
            </div>
            <div class="form-group">
                <label for="sex">Sexo:</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select class="form-control" id="rol" name="rol" required>
                    <option value="" disabled selected>Seleccione un rol...</option>
                    <option value="Jefe de archivo general">Jefe de archivo general</option>
                    <option value="Empleado de trámite">Empleado de trámite</option>
                    <option value="Empleado de concentración">Empleado de concentración</option>
                    <option value="Empleado de histórico">Empleado de histórico</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="activo" id="activo" value="1"
                    {{ old('activo') ? 'checked' : '' }}>
                <label class="form-check-label" for="activo">Activo</label>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
          
            <a href="{{ route('usuario_index') }}" class="btn btn-secondary">Cancelar</a>
       
       
        </form>
    </div>
@endsection
