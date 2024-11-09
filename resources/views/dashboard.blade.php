@extends('layouts.app')

@section('content')
   

    <div class="bienv"> 
        <img src="img/icon/bienve.png" alt="">
    </div>

    <div class="description-box">
        <div class="menu-container">
            <div class="menu-box">
                <a href="{{ route('usuario_index') }}">
                    <div class="menu-icon">
                        <img src="{{ asset('img/icon/user.png') }}" alt="Usuarios">
                    </div>
                    <div class="menu-title">
                        <h2>Gestion de usuarios</h2>
                    </div>
                    
                </a>
            </div>

            <div class="menu-box">
                <a href="{{ route('tramite_index') }}">
                    <div class="menu-icon">
                    <img src="{{ asset('img/icon/tramite.png') }}" alt="Trámites">

                    </div>
                    <div class="menu-title">
                        <h2>Trámites disponibles</h2>
                    </div>
                </a>
            </div>

            <div class="menu-box">
                <a href="{{ route('concentracion_index') }}">
                    <div class="menu-icon">
                        <img src="img/icon/concentracion.png" alt="Concentración">
                    </div>
                    <div class="menu-title">
                        <h2>Expedientes</h2>
                    </div>
                </a>
            </div>

            <div class="menu-box">
                <a href="{{ route('historico_index') }}">
                    <div class="menu-icon">
                        <img src="img/icon/historico.png" alt="Histórico">
                    </div>
                    <div class="menu-title">
                        <h2>Consultar histórico</h2>
                    </div>
                </a>
            </div>

            <div class="menu-box">
                <a href="{{ route('areas_index') }}">
                    <div class="menu-icon">
                        <img src="img/icon/area.png" alt="Asigancion Area">
                    </div>
                    <div class="menu-title">
                        <h2>Áreas asignadas</h2>
                    </div>
                </a>
            </div>

            <div class="menu-box">
                <a href="{{ route('rol_index') }}">
                    <div class="menu-icon">
                        <img src="img/icon/rol.png" alt="Roles">
                    </div>
                    <div class="menu-title">
                        <h2>Configuración de roles</h2>
                    </div>
                </a>
            </div>
            <div class="menu-box">
                <a href="{{ route('usuario_area_rol_index') }}">
                    <div class="menu-icon">
                        <img src="img/icon/asignar.png" alt="Asignar roles y áreas">
                    </div>
                    <div class="menu-title">
                        <h2>Asignar roles y áreas</h2>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <div class="importante">
        <h3>
            IMPORTANTE
        </h3>
        <p> 
        La administración eficiente de documentos históricos es clave para preservar, organizar y acceder fácilmente a información relevante
         a lo largo del tiempo. Un software de gestión documental en un archivo histórico permite digitalizar y clasificar documentos, agilizar
         la búsqueda de información y garantizar la seguridad y conservación de los archivos.
        </p>
    </div>



    <div class="gobierno">
        <h3>
             Marco Legal y proteccion de datos del Gobierno de México 
        </h3>
        <br>
        <p> 
        El Gobierno de México es el titular de todos los datos proporcionados a través de este programa. Se requiere un uso responsable de esta información; cualquier uso indebido podría derivar en sanciones legales.
        Los datos aquí almacenados son de carácter confidencial y están protegidos bajo las leyes y normativas vigentes en México. Cualquier consulta, procesamiento o difusión no autorizada de la información será considerada una infracción y será tratada de acuerdo con las disposiciones legales correspondientes.
        </p>
    </div>

    <div class="gob-img">
        <img src="img/icon/gobierno.png" alt="">
    </div>






    {{-- Descomentar esto si necesitas mostrar alertas de trámites --}}
    {{-- <div class="alerts-section">
            <h2>Alertas de Trámites</h2>
            <ul>
                @foreach ($tramitesPendientes as $tramite)
                    <li>
                        <strong>Trámite ID:</strong> {{ $tramite->id }} - 
                        <strong>Estado:</strong> {{ $tramite->estado }} - 
                        <strong>Fecha Límite:</strong> {{ $tramite->fecha_limite->format('d/m/Y') }}
                    </li>
                @endforeach
            </ul>
        </div> --}}
    </div>
@endsection
