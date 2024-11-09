@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Históricos</h3>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('historico_alta') }}">
                                <button type="button" class="btn btn-warning">Nuevo Registro</button>
                            </a>

                            <form action="{{ route('historico_index') }}" method="GET" class="d-flex align-items-center">
                                {{ csrf_field() }}

                                <div class="form-floating me-2">
                                    <input type="text" class="form-control" name="buscar" value="{{ old('buscar') }}"
                                        id="floatingBuscar" placeholder="ejemplo: Roberto Vinicio"
                                        aria-describedby="buscarHelp">
                                    <label for="floatingBuscar">Buscar</label>
                                    <div id="buscarHelp" class="form-text">
                                        @if ($errors->first('buscar'))
                                            <small class="text-danger">{{ $errors->first('buscar') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Buscar</button>

                                <a href="{{ route('historico_index') }}">
                                    <button type="button" class="btn btn-danger">Reiniciar</button>
                                </a>
                            </form>
                        </div>

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
                                @if ($historicos->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">No hay registros disponibles.</td>
                                    </tr>
                                @else
                                    @foreach ($historicos as $key => $historico)
                                        <tr>
                                            <td>{{ $historicos->firstItem() + $key }}</td>
                                            <td>{{ $historico->id_historico }}</td>
                                            <td>{{ $historico->usuario->nombre }} {{ $historico->usuario->apellidoP }}
                                                {{ $historico->usuario->apellidoM }}</td>
                                            <td>
                                                @if ($historico->tramite)
                                                    {{ $historico->tramite->estado }}
                                                @else
                                                    <span class="text-muted">Sin trámite asignado</span>
                                                @endif
                                            </td>
                                            <td>{{ $historico->tipo_documento }}</td>
                                            <td>{{ $historico->valor_historico }}</td>
                                            <td>{{ $historico->acceso_publico ? 'Sí' : 'No' }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('historico_modificar', ['id' => $historico->id_historico]) }}">
                                                    <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                                </a>
                                                <a
                                                    href="{{ route('historico_eliminar', ['id' => $historico->id_historico]) }}">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Seguro que quieres borrar este registro?')">
                                                        Borrar
                                                    </button>
                                                </a>
                                                <a
                                                    href="{{ route('historico_detalle', ['id' => $historico->id_historico]) }}">
                                                    <button type="button" class="btn btn-info">Detalle</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Mostrando {{ $historicos->firstItem() }} a {{ $historicos->lastItem() }}
                                    de {{ $historicos->total() }} concentraciones</small>
                            </div>
                            <div>
                                {{ $historicos->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
