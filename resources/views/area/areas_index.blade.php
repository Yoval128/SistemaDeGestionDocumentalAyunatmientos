@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Asignación de Áreas</h3>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                           
                            <a href="{{ route('areas_alta') }}">
                                <button type="button" class="btn btn-warning">Nueva Asignación</button>
                            </a>

                            <form action="{{ route('areas_index') }}" method="GET" enctype="multipart/form-data" class="d-flex align-items-center">
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
                            
                                <a href="{{ route('areas_index') }}">
                                    <button type="button" class="btn btn-danger">Reiniciar</button>
                                </a>
                            </form>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Area</th>
                                    <th>Área</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($areas->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">No hay áreas disponibles.</td>
                                    </tr>
                                @else
                                    @foreach ($areas as $key => $area)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $area->id_area }}</td>
                                            <td>{{ $area->nombre }}</td>
                                            <td>
                                                <a href="{{ route('areas_modificar', ['id' => $area->id_area]) }}">
                                                    <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                                </a>
                                                <a href="{{ route('areas_eliminar', ['id' => $area->id_area]) }}">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Seguro que quieres borrar esta asignación?')">Borrar</button>
                                                </a>
                                                <a href="{{ route('areas_detalle', ['id' => $area->id_area]) }}">
                                                    <button type="button" class="btn btn-info btn-sm">Detalle</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        {{ $areas->links('pagination::bootstrap-5') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
