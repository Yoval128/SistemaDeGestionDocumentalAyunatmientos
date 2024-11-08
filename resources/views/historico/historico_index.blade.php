@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Históricos</h3>

                        <a href="{{ route('historico_alta') }}">
                            <button type="button" class="btn btn-warning mb-3">Nuevo Registro Histórico</button>
                        </a>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Usuario Asignado</th>
                                    <th>Trámite</th>
                                    <th>Tipo de Documento</th>
                                    <th>Valor Histórico</th>
                                    <th>Acceso Público</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($datos))
                                    <tr>
                                        <td colspan="8" class="text-center">No hay registros disponibles.</td>
                                    </tr>
                                @else

                                @foreach ($datos as $key => $historico)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $historico->id_historico }}</td>
                                    <td>{{ $historico->usuario_nombre }} {{ $historico->usuario_apellidoP }} {{ $historico->usuario_apellidoM }}</td>
                                    <td>{{ $historico->descripcion_tramite }}</td>
                                    <td>{{ $historico->tipo_documento }}</td>
                                    <td>{{ $historico->valor_historico }}</td>
                                    <td>{{ $historico->acceso_publico ? 'Sí' : 'No' }}</td>
                                    <td>

                                        <td>
                                            <a href="{{ route('historico_modificar', ['id' => $historico->id_historico]) }}">
                                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                            </a>
                                            <a href="{{ route('historico_eliminar', ['id' => $historico->id_historico]) }}">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que quieres borrar este registro?')">
                                                    Borrar
                                                </button>
                                            </a>
                                            <a href="{{ route('historico_detalle', ['id' => $historico->id_historico]) }}">
                                                <button type="button" class="btn btn-info">Detalle</button>
                                            </a>
                                        </td>
                                    </tr>
                                    </td>
                                </tr>
                                @endforeach
                                
                            
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
