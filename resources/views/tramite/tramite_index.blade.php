@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Trámites</h3>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                         
                            <a href="{{ route('tramite_alta') }}">
                                <button type="button" class="btn btn-warning">Nuevo Tramite</button>
                            </a>

                            <form action="{{ route('tramite_index') }}" method="GET" class="d-flex align-items-center">
                                {{ csrf_field() }}
                            
                                <div class="form-floating me-2">
                                    <input type="text" class="form-control" name="buscar" value="{{ old('buscar', $buscar) }}"
                                           id="floatingBuscar" placeholder="ejemplo: Roberto Vinicio"
                                           aria-describedby="buscarHelp">
                                    <label for="floatingBuscar">Buscar</label>
                                    <div id="buscarHelp" class="form-text">
                                        @if ($errors->first('buscar'))
                                            <small class="text-danger">{{ $errors->first('buscar') }}</small>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="form-floating me-2">
                                    <input type="date" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio', $fecha_inicio) }}"
                                           id="floatingFechaInicio" aria-describedby="fechaInicioHelp">
                                    <label for="floatingFechaInicio">Fecha de Inicio</label>
                                    <div id="fechaInicioHelp" class="form-text">
                                        @if ($errors->first('fecha_inicio'))
                                            <small class="text-danger">{{ $errors->first('fecha_inicio') }}</small>
                                        @endif
                                    </div>
                                </div>
                            
                                <div class="form-floating me-2">
                                    <input type="date" class="form-control" name="fecha_limite" value="{{ old('fecha_limite', $fecha_limite) }}"
                                           id="floatingFechaLimite" aria-describedby="fechaLimiteHelp">
                                    <label for="floatingFechaLimite">Fecha Límite</label>
                                    <div id="fechaLimiteHelp" class="form-text">
                                        @if ($errors->first('fecha_limite'))
                                            <small class="text-danger">{{ $errors->first('fecha_limite') }}</small>
                                        @endif
                                    </div>
                                </div>
                            
                                <button type="submit" class="btn btn-primary me-2">Buscar</button>
                            
                                <a href="{{ route('tramite_index') }}">
                                    <button type="button" class="btn btn-danger">Reiniciar</button>
                                </a>
                            </form>
                            
                            
                        </div>
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
                                @foreach ($tramites as $key => $tramite)
                                    <tr>
                                       
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $tramite->id_tramite }}</td>
                                        <td>{{ $tramite->area->nombre }}</td>
                                        <td>{{ $tramite->usuario->nombre }} {{ $tramite->usuario->apellidoP }} {{ $tramite->usuario->apellidoM }}</td> <!-- Muestra el nombre completo del usuario -->
                                        <td>{{ \Carbon\Carbon::parse($tramite->fecha_inicio)->format('m/d/y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($tramite->fecha_limite)->format('m/d/y') }}</td> <
                                        <td>{{ $tramite->estado }}</td>                                        
                                        <td>
                                            <a href="{{ route('tramite_modificar', ['id' => $tramite->id_tramite]) }}">
                                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                            </a>
                                            <a href="{{ route('tramite_eliminar', ['id' => $tramite->id_tramite]) }}">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que quieres borrar este registro?')">
                                                    Borrar
                                                </button>
                                            </a>
                                            <a href="{{ route('tramite_detalle', ['id' => $tramite->id_tramite]) }}">
                                                <button type="button" class="btn btn-info">Detalle</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Mostrando {{ $tramites->firstItem() }} a {{ $tramites->lastItem() }} de {{ $tramites->total() }} trámites</small>
                            </div>
                            <div>
                                {{ $tramites->links('pagination::bootstrap-5') }}
                            </div>
                        </div>                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
