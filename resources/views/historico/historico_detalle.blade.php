@extends('layouts.app')

@section('content')
    <h3>Detalles del Registro Histórico</h3>
    <hr>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>ID del Histórico:</strong>
                    <p>{{ $historico->id_historico }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Usuario Asignado:</strong>
                    <p>{{ $historico->id_usuario_asigando }}</p> <!-- Considera mostrar el nombre del usuario si tienes la relación -->
                </div>
                <div class="col-md-4">
                    <strong>ID del Trámite:</strong>
                    <p>{{ $historico->id_tramite }}</p> <!-- Considera mostrar información del trámite si tienes la relación -->
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Tipo de Documento:</strong>
                    <p>{{ $historico->tipo_documento }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Valor Histórico:</strong>
                    <p>{{ $historico->valor_historico }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Acceso Público:</strong>
                    <p>{{ $historico->acceso_publico ? 'Sí' : 'No' }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Restricciones de Acceso:</strong>
                    <p>{{ $historico->restricciones_acceso }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Documentos Adjuntos:</strong>
                    <ul>
                        @if ($historico->documentos_adjuntos)
                            @foreach (json_decode($historico->documentos_adjuntos) as $documento)
                                <li>
                                    <a href="{{ url('pdfs/' . $documento) }}" target="_blank">{{ $documento }}</a>
                                </li>
                            @endforeach
                        @else
                            <li>No hay documentos adjuntos.</li>
                        @endif
                    </ul>
                </div>
            </div>

            <a href="{{ route('historico_index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
@endsection
