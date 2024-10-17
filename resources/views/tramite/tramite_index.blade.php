@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Trámites</h3>

                        <a href="{{ route('tramite_alta') }}">
                            <button type="button" class="btn btn-warning mb-3">Nuevo Registro de Trámite</button>
                        </a>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Área</th>
                                    <th>Usuario</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha Límite</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tramite as $key => $tramites)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $tramites->id_tramite }}</td>
                                        <td>{{ $tramites->id_area }}</td> 
                                        <td>{{ $tramites->id_usuario }}</td> 
                                        <td>{{ $tramites->fecha_inicio }}</td>
                                        <td>{{ $tramites->fecha_limite }}</td>
                                        <td>{{ $tramites->estado }}</td>
                                        <td>
                                            <a href="{{ route('tramite_modificar', ['id' => $tramites->id_tramite]) }}">
                                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                            </a>
                                            <a href="{{ route('tramite_eliminar', ['id' => $tramites->id_tramite]) }}">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que quieres borrar este registro?')">
                                                    Borrar
                                                </button>
                                            </a>
                                            <a href="{{ route('tramite_detalle', ['id' => $tramites->id_tramite]) }}">
                                                <button type="button" class="btn btn-info">Detalle</button>
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
