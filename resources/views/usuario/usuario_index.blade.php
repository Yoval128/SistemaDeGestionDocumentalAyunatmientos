@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Usuarios</h3>

                        <a href="{{ route('usuario_alta') }}">
                            <button type="button" class="btn btn-warning mb-3">Nuevo Registro RAT</button>

                        </a>

                        <table class="table table-striped">
                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuario as $key => $usuarios)
                                    <tr>

                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $usuarios->id_usuario }}</td>
                                        <td><img src="{{ 'img/' . $usuarios->foto }}" style="width: 50px; height:50px;">
                                        </td>
                                        <td>{{ $usuarios->nombre }}</td>
                                        <td>{{ $usuarios->apellidoP . ' ' . $usuarios->apellidoM }}</td>
                                        {{-- <td>{{ $usuarios->sex == 'M' ? 'Masculino' : 'Femenino' }} </td> --}}
                                        <td>{{ $usuarios->email }}</td>
                                        <td>{{ $usuarios->rol }}</td>
                                        <td>
                                            <a href="{{ route('usuario_modificar', ['id' => $usuarios->id_usuario]) }}">
                                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                            </a>
                                            <a href="{{ route('usuario_eliminar', ['id' => $usuarios->id_usuario]) }}">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que quieres borrar este registro?')">
                                                    Borrar
                                                </button>
                                            </a>

                                            <a href="{{ route('usuario_detalle', ['id' => $usuarios->id_usuario]) }}">
                                                <button type="button" class="btn btn-info">
                                                    Detalle
                                                </button>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
