@extends('layouts.app')

@section('content')
    
    <div class="header-home">
        <div class="greeting-box">
            <h3>¡Hola, bienvenido {{ $user->nombre }}!</h3>
        </div>
        <div class="greeting-actions">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </div>


    <div class="title-box">
        <h1>Panel de Control</h1>
    </div>

    <div class="description-box">
        <div class="menu-container">
            <div class="menu-box">
                <a href="{{ route('usuario_index') }}">
                    <div class="menu-icon">
                        <img src="/path/to/user-icon.png" alt="Usuarios">
                    </div>
                    <div class="menu-title">
                        <h2>Usuarios</h2>
                    </div>
                    <div class="menu-description">
                        <p>Alta, modificación y eliminación de usuarios</p>
                    </div>
                </a>
            </div>

            <div class="menu-box">
                <a href="{{ route('tramite_index') }}">
                    <div class="menu-icon">
                        <img src="/path/to/tramite-icon.png" alt="Trámites">
                    </div>
                    <div class="menu-title">
                        <h2>Trámites</h2>
                    </div>
                    <div class="menu-description">
                        <p>Creación y gestión de trámites</p>
                    </div>
                </a>
            </div>

            <div class="menu-box">
                <a href="{{ route('concentracion_index') }}">
                    <div class="menu-icon">
                        <img src="/path/to/concentracion-icon.png" alt="Concentración">
                    </div>
                    <div class="menu-title">
                        <h2>Concentración</h2>
                    </div>
                    <div class="menu-description">
                        <p>Gestión de expedientes procesados</p>
                    </div>
                </a>
            </div>

            <div class="menu-box">
                <a href="{{ route('historico_index') }}">
                    <div class="menu-icon">
                        <img src="/path/to/historico-icon.png" alt="Histórico">
                    </div>
                    <div class="menu-title">
                        <h2>Histórico</h2>
                    </div>
                    <div class="menu-description">
                        <p>Consulta de documentos históricos</p>
                    </div>
                </a>
            </div>
        </div>
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
