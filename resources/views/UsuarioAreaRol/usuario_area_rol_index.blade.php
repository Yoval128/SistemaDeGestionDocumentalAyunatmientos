@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Nuevo Registro de Asignación de Usuario, Área y Rol</h3>
        <hr>

        <div class="card">
            <form action="{{ route('usuario_area_rol_registrar') }}" method="post">
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
                    <label for="id_usuario">Usuario:</label>
                    <select class="form-select" id="id_usuario" name="id_usuario" required>
                        <option value="" disabled selected>Selecciona un Usuario...</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id_usuario }}"
                                {{ old('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
                                {{ $usuario->nombre }} {{ $usuario->apellidoP }} {{ $usuario->apellidoM }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_area">Área:</label>
                    <select class="form-select" id="id_area" name="id_area" required>
                        <option value="" disabled selected>Selecciona un Área...</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id_area }}" {{ old('id_area') == $area->id_area ? 'selected' : '' }}>
                                {{ $area->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_rol">Rol:</label>
                    <select class="form-select" id="id_rol" name="id_rol" required>
                        <option value="" disabled selected>Selecciona un Rol...</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id_rol }}" {{ old('id_rol') == $rol->id_rol ? 'selected' : '' }}>
                                {{ $rol->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <br>
            </form>
        </div>

        <br>
        <hr>
        <h3>Asignaciones de Usuarios a Áreas y Roles</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Área</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaciones as $key => $asignacion)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $asignacion->id_usuario_area_rol }}</td>
                        <td>{{ $asignacion->usuario->nombre }} {{ $asignacion->usuario->apellidoP }}
                            {{ $asignacion->usuario->apellidoM }}</td>
                        <td>{{ $asignacion->area->nombre }}</td>
                        <td>{{ $asignacion->rol->nombre }}</td>
                        {{-- <td>{{ $asignacion->fecha_asignacion }}</td> --}}
                        <td>
                            <a
                                href="{{ route('usuario_area_rol_modificar', ['id' => $asignacion->id_usuario_area_rol]) }}">
                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                            </a>
                            <a href="{{ route('usuario_area_rol_eliminar', ['id' => $asignacion->id_usuario_area_rol]) }}">
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que quieres borrar este rol?')">Borrar</button>
                            </a>
                            <a href="{{ route('usuario_area_rol_detalle', ['id' => $asignacion->id_usuario_area_rol]) }}">
                                <button type="button" class="btn btn-info btn-sm">Detalle</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
