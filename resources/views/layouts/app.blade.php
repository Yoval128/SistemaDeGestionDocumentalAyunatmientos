<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Gestión de archivos')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .sidebar {
            min-width: 250px;
            background: #f8f9fa;
            padding: 20px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>

<body>

    @include('layouts.header')

    <div class="d-flex flex-grow-1">
        <div class="sidebar">
            <h5>Menú de Navegación</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>Usuarios</strong></li>
                <li class="list-group-item"><a href="{{ route('usuario_index') }}">Mostrar Usuarios</a></li>
                <li class="list-group-item"><a href="{{ route('usuario_alta') }}">Crear Usuario</a></li>

                <li class="list-group-item"><strong>Trámites</strong></li>
                <li class="list-group-item"><a href="{{ route('tramite_index') }}">Mostrar Trámites</a></li>
                <li class="list-group-item"><a href="{{ route('tramite_alta') }}">Crear Trámite</a></li>

                <li class="list-group-item"><strong>Concentración</strong></li>
                <li class="list-group-item"><a href="{{ route('concentracion_index') }}">Mostrar Concentración</a></li>
                <li class="list-group-item"><a href="{{ route('concentracion_alta') }}">Crear Concentración</a></li>
                </li>

                <li class="list-group-item"><strong>Histórico</strong></li>
                <li class="list-group-item"><a href="{{ route('historico_index') }}">Mostrar Histórico</a></li>
                <li class="list-group-item"><a href="{{ route('historico_alta') }}">Agregar Documento Histórico</a>
                </li>

                {{-- <li class="list-group-item"><strong>Monitoreo IoT</strong></li>
                <li class="list-group-item"><a href="{{ route('iot_index') }}">Mostrar Monitoreo</a></li>
                <li class="list-group-item"><a href="{{ route('iot_detalle') }}">Detalles Monitoreo</a></li>
 --}}
                
            </ul>
        </div>

        <div class="main-content">
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
