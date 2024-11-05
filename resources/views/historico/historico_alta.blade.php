@extends('layouts.app')

@section('content')
    <h3>Nuevo Registro Histórico</h3>
    <hr>

    <div class="card">
        <form action="{{ route('historico_registrar') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

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
                <label for="id_usuario_asigando">Usuario asignado:</label>
                <select class="form-select" id="id_usuario_asigando" name="id_usuario_asigando" required>
                    <option value="" disabled selected>Selecciona una opción...</option>
                    @foreach ($usuarios as $usuario)

                        <option value="{{ $usuario->id_usuario }}">
                            {{ $usuario->nombre }} {{ $usuario->apellidoP }} {{ $usuario->apellidoM }}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <div class="form-group">
                <label for="id_tramite">Trámite:</label>
                <select class="form-select" id="id_tramite" name="id_tramite" required>
                    <option value="" disabled selected>Selecciona una opción...</option>
                    @foreach ($tramites as $tramite)
                        <option value="{{ $tramite->id_tramite }}">{{ $tramite->observaciones }}</option>
                    @endforeach
                </select>
            </div>

            
            <div class="form-group">
                <label for="tipo_documento">Tipo de Documento:</label>
                <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                    <option value="" disabled selected>Selecciona una opción...</option>
                    <option value="Actas">Actas</option>
                    <option value="Resoluciones">Resoluciones</option>
                    <option value="Decretos">Decretos</option>
                    <option value="Informes">Informes</option>
                    <option value="Contratos y Convenios">Contratos y Convenios</option>
                    <option value="Correspondencia Oficial">Correspondencia Oficial</option>
                    <option value="Memorandos">Memorandos</option>
                    <option value="Planos y Mapas">Planos y Mapas</option>
                    <option value="Reglamentos y Normativas">Reglamentos y Normativas</option>
                    <option value="Proyectos y Propuestas">Proyectos y Propuestas</option>
                    <option value="Documentos Legales">Documentos Legales</option>
                    <option value="Cédulas y Certificados">Cédulas y Certificados</option>
                    <option value="Actas de Propiedad o Escrituras">Actas de Propiedad o Escrituras</option>
                    <option value="Testimonios y Transcripciones">Testimonios y Transcripciones</option>
                    <option value="Publicaciones Oficiales">Publicaciones Oficiales</option>
                </select>
            </div>

            <div class="form-group">
                <label for="valor_historico">Valor Histórico:</label>
                <textarea class="form-control" id="valor_historico" name="valor_historico" required></textarea>
            </div>
            <div class="form-group">
                <label for="acceso_publico">Acceso Público:</label>
                <select class="form-control" id="acceso_publico" name="acceso_publico" required>
                    <option value="" disabled selected>Seleccione una opción...</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="restricciones_acceso">Restricciones de Acceso:</label>
                <textarea class="form-control" id="restricciones_acceso" name="restricciones_acceso"></textarea>
            </div>
            <div class="form-group">
                <label for="documentos_adjuntos">Documentos Adjuntos:</label>
                <input type="file" class="form-control" id="documentos_adjuntos" name="documentos_adjuntos[]" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('historico_index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection