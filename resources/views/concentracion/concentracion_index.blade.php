@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Concentraciones</h3>

                        <a href="{{ route('concentracion_registrar') }}">
                            <button type="button" class="btn btn-warning mb-3">Nueva Concentración</button>
                        </a>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Clave</th>
                                    <th>Nombre Expediente</th>
                                    <th>Fondo</th>
                                    <th>Sección</th>
                                    <th>Subsección</th>
                                    <th>Año de Creación</th>
                                    <th>Año de Cierre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($concentraciones as $key => $concentracion)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $concentracion->id_concentracion }}</td>
                                        <td>{{ $concentracion->calve }}</td>
                                        <td>{{ $concentracion->nombre_expediente }}</td>
                                        <td>{{ $concentracion->fondo }}</td>
                                        <td>{{ $concentracion->seccion }}</td>
                                        <td>{{ $concentracion->subseccion }}</td>
                                        <td>{{ $concentracion->ano_creacion }}</td>
                                        <td>{{ $concentracion->ano_cierre }}</td>
                                        <td>
                                            <a href="{{ route('concentracion_editar', ['id' => $concentracion->id_concentracion]) }}">
                                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                            </a>
                                            <form action="{{ route('concentracion_eliminar', ['id' => $concentracion->id_concentracion]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres borrar este registro?')">
                                                    Borrar
                                                </button>
                                            </form>
                                            <a href="{{ route('concentracion_detalle', ['id' => $concentracion->id_concentracion]) }}">
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
