@extends('layouts.app')

@section('content')
    <h3>Nuevo Trámite</h3>
    <hr>

    <div class="card">
        <form action="{{ route('tramite_registrar') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="id_area">Área:</label>
                <select class="form-select" id="id_area" name="id_area">
                    <option selected>Selecciona una opción...</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id_area }}">
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_usuario">Usuario:</label>
                <select class="form-select" id="id_usuario" name="id_usuario">
                    <option selected>Selecciona una opción...</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}">
                            {{ $usuario->nombre }} {{ $usuario->apellidoP }} {{ $usuario->apellidoM }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
            </div>
            <div class="form-group">
                <label for="fecha_limite">Fecha Límite:</label>
                <input type="date" class="form-control" id="fecha_limite" name="fecha_limite" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="" disabled selected>Seleccione un estado...</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="En Proceso">En Proceso</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones:</label>
                <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
            </div>
            <div class="form-group">
                <label for="documentos_adjuntos">Documentos Adjuntos:</label>
                <input type="file" class="form-control" id="documentos_adjuntos" name="documentos_adjuntos[]" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('tramite_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
