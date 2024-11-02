@extends('layouts.app')

@section('content')
    <h3>Detalles del Trámite</h3>
    <hr>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>ID del Trámite:</strong>
                    <p>{{ $tramite->id_tramite }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Área:</strong>
                    <p>{{ $tramite->id_area }}</p> <!-- Considera mostrar el nombre del área si tienes la relación -->
                </div>
                <div class="col-md-4">
                    <strong>Usuario:</strong>
                    <p>{{ $usuario->nombre }} {{ $usuario->apellidoP }} {{ $usuario->apellidoM }}</p> <!-- Nombre del usuario -->
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Fecha de Inicio:</strong>
                    <p>{{ \Carbon\Carbon::parse($tramite->fecha_inicio)->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Fecha Límite:</strong>
                    <p>{{ \Carbon\Carbon::parse($tramite->fecha_limite)->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Estado:</strong>
                    <p>{{ $tramite->estado }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Observaciones:</strong>
                    <p>{{ $tramite->observaciones }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Documentos Adjuntos:</strong>
                    <div class="documentos-container">
                        @if ($tramite->documentos_adjuntos)
                            @foreach (json_decode($tramite->documentos_adjuntos) as $documento)
                                <a href="{{ url('pdfs/' . $documento) }}" target="_blank" class="btn btn-primary btn-sm documento-btn">
                                    {{ $documento }}
                                </a>
                            @endforeach
                        @else
                            <p>No hay documentos adjuntos.</p>
                        @endif
                    </div>
                </div>
            </div>
            
            <a href="{{ route('tramite_index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
@endsection