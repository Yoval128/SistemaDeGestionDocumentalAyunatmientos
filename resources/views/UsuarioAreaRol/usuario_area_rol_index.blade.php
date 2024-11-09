@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Nuevo Registro de Asignación de Usuario, Área y Rol</h3>
        <hr>

        <div class="card">
            <form action="{{ route('usuario_area_rol_registrar') }}" method="post">
                @csrf
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
                    <label for="id_usuario">Usuario:</label>
                    <select class="form-select" id="id_usuario" name="id_usuario" required>
                        <option value="" disabled selected>Selecciona un Usuario...</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id_usuario }} "
                                {{ old('id_usuario') == $usuario->id_usuario ? 'selected' : '' }}>
                                {{ $usuario->nombre }} {{ $usuario->apellidoP }} {{ $usuario->apellidoM }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_area">Área:</label>
                    <select class="form-select" id="id_area" name="id_area" required>
                        <option value="" disabled selected>Selecciona un Área...</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id_area }}" {{ old('id_area') == $area->id_area ? 'selected' : '' }}>
                                {{ $area->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_rol">Rol:</label>
                    <select class="form-select" id="id_rol" name="id_rol" required>
                        <option value="" disabled selected>Selecciona un Rol...</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id_rol }}" {{ old('id_rol') == $rol->id_rol ? 'selected' : '' }}>
                                {{ $rol->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <br>
            </form>
        </div>

        <br>
        <hr>
        <h3>Asignaciones de Usuarios a Áreas y Roles</h3>

        <!-- Botones para descargar PDF y Excel -->
        <button id="download-pdf" class="btn btn-primary mb-3">Descargar PDF</button>
        <button id="download-excel" class="btn btn-success mb-3">Descargar Excel</button>

        <table id="asignaciones-table" class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Área</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaciones as $key => $asignacion)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $asignacion->id_usuario_area_rol }}</td>
                        <td>{{ $asignacion->usuario->nombre }} {{ $asignacion->usuario->apellidoP }}
                            {{ $asignacion->usuario->apellidoM }}</td>
                        <td>{{ $asignacion->area->nombre }}</td>
                        <td>{{ $asignacion->rol->nombre }}</td>
                        <td>
                            <a href="{{ route('usuario_area_rol_modificar', ['id' => $asignacion->id_usuario_area_rol]) }}">
                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                            </a>
                            <a href="{{ route('usuario_area_rol_eliminar', ['id' => $asignacion->id_usuario_area_rol]) }}">
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que quieres borrar esta asignación?')">Borrar</button>
                            </a>
                            <a href="{{ route('usuario_area_rol_detalle', ['id' => $asignacion->id_usuario_area_rol]) }}">
                                <button type="button" class="btn btn-info btn-sm">Detalle</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Incluir la librería jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- Incluir la librería SheetJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        // Función para generar el PDF
        document.getElementById('download-pdf').addEventListener('click', function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.setFont("helvetica");
            doc.setFontSize(10);

            // Título
            doc.text('Asignación de Usuarios a Áreas y Roles', 10, 10);
            let y = 20;

            // Recorrer las filas de la tabla
            const table = document.getElementById('asignaciones-table');
            Array.from(table.rows).forEach((row, index) => {
                if (index === 0) return; // Saltar la fila del encabezado

                const cells = row.cells;
                const rowData = [
                    cells[0].textContent, // #
                    cells[1].textContent, // ID
                    cells[2].textContent, // Usuario
                    cells[3].textContent, // Área
                    cells[4].textContent  // Rol
                ];

                // Agregar fila al PDF
                const rowText = rowData.join(' | ');
                doc.text(rowText, 10, y);
                y += 10;

                // Si la página está llena, agregar una nueva
                if (y > 270) {
                    doc.addPage();
                    y = 10;
                }
            });

            // Descargar PDF
            doc.save('asignaciones_usuarios_areas_roles.pdf');
        });

        // Función para generar el archivo Excel
        document.getElementById('download-excel').addEventListener('click', function () {
            const table = document.getElementById('asignaciones-table');
            const wb = XLSX.utils.table_to_book(table, { sheet: 'Asignaciones' });
            XLSX.writeFile(wb, 'asignaciones_usuarios_areas_roles.xlsx');
        });
    </script>
@endsection
