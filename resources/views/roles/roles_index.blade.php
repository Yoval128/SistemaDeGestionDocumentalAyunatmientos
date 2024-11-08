@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Asignación de Roles</h3>


                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <a href="{{ route('rol_alta') }}">
                                <button type="button" class="btn btn-warning">Nuevo Rol</button>
                            </a>

                            <form action="{{ route('rol_index') }}" method="GET" enctype="multipart/form-data"
                                class="d-flex align-items-center">
                                {{ csrf_field() }}

                                <div class="form-floating me-2">
                                    <input type="input" class="form-control" name="buscar" value="{{ old('buscar') }}"
                                        id="floatingBuscar" placeholder="ejemplo: Roberto Vinicio"
                                        aria-describedby="buscarHelp">
                                    <label for="floatingBuscar">Buscar</label>
                                    <div id="buscarHelp" class="form-text">
                                        @if ($errors->first('buscar'))
                                            <i>El campo Buscar no es correcto!!!</i>
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Buscar</button>

                                <a href="{{ route('rol_index') }}">
                                    <button type="button" class="btn btn-danger">Reiniciar</button>
                                </a>
                            </form>
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Rol</th>
                                    <th>Rol</th>
                                    <th>Descripcción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($roles->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">No hay roles disponibles.</td>
                                    </tr>
                                @else
                                    @foreach ($roles as $key => $rol)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $rol->id_rol }}</td>
                                            <td>{{ $rol->nombre }}</td>
                                            <td>{{ $rol->descripccion }}</td>
                                            <td>
                                                <a href="{{ route('rol_modificar', ['id' => $rol->id_rol]) }}">
                                                    <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                                </a>
                                                <a href="{{ route('rol_eliminar', ['id' => $rol->id_rol]) }}">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Seguro que quieres borrar este rol?')">Borrar</button>
                                                </a>
                                                <a href="{{ route('rol_detalle', ['id' => $rol->id_rol]) }}">
                                                    <button type="button" class="btn btn-info btn-sm">Detalle</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Mostrando {{ $roles->firstItem() }} a {{ $roles->lastItem() }} de {{ $roles->total() }} Roles</small>
                            </div>
                            <div>
                                {{ $roles->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
