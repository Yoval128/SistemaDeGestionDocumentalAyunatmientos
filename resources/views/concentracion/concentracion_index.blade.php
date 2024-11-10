@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Concentraciones</h3>

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <a href="{{ route('concentracion_alta') }}">
                                <button type="button" class="btn btn-warning">Nuevo Registro</button>
                            </a>

                            <form action="{{ route('concentracion_index') }}" method="GET"
                                class="d-flex align-items-center">
                                {{ csrf_field() }}

                                <!-- Campo de búsqueda -->
                                <div class="form-floating me-2">
                                    <input type="text" class="form-control" name="buscar"
                                        value="{{ old('buscar', $buscar) }}" id="floatingBuscar"
                                        aria-describedby="buscarHelp">
                                    <label for="floatingBuscar">Buscar</label>
                                    <div id="buscarHelp" class="form-text">
                                        @if ($errors->first('buscar'))
                                            <small class="text-danger">{{ $errors->first('buscar') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <!-- Filtro de fecha de inicio -->
                                <div class="form-floating me-2">
                                    <input type="date" class="form-control" name="fecha_inicio"
                                        value="{{ old('fecha_inicio', $fecha_inicio) }}" id="floatingFechaInicio"
                                        aria-describedby="fechaInicioHelp">
                                    <label for="floatingFechaInicio">Fecha de Inicio</label>
                                    <div id="fechaInicioHelp" class="form-text">
                                        @if ($errors->first('fecha_inicio'))
                                            <small class="text-danger">{{ $errors->first('fecha_inicio') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <!-- Filtro de fecha límite -->
                                <div class="form-floating me-2">
                                    <input type="date" class="form-control" name="fecha_limite"
                                        value="{{ old('fecha_limite', $fecha_limite) }}" id="floatingFechaLimite"
                                        aria-describedby="fechaLimiteHelp">
                                    <label for="floatingFechaLimite">Fecha Cierre</label>
                                    <div id="fechaLimiteHelp" class="form-text">
                                        @if ($errors->first('fecha_limite'))
                                            <small class="text-danger">{{ $errors->first('fecha_limite') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <!-- Botones de búsqueda y reiniciar -->
                                <button type="submit" class="btn btn-primary me-2">Buscar</button>
                                <a href="{{ route('concentracion_index') }}">
                                    <button type="button" class="btn btn-danger">Reiniciar</button>
                                </a>
                            </form>



                        </div>

                        <!-- Botones para generar PDF y Excel -->
                        <button id="download-pdf" class="btn btn-primary mb-3">Descargar PDF</button>
                        <button id="download-excel" class="btn btn-success mb-3">Descargar Excel</button>

                        <table id="concentraciones-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Clave</th>
                                    <th>Nombre <br> Expediente</th>
                                    <th>Fondo</th>
                                    <th>Sección</th>
                                    <th>Año</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($concentraciones as $key => $concentracion)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $concentracion->id_concentracion }}</td>
                                        <td>{{ $concentracion->clave }}</td>
                                        <td>{{ $concentracion->nombre_expediente }}</td>
                                        <td>{{ $concentracion->fondo }}</td>
                                        <td>{{ $concentracion->seccion }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($concentracion->ano_creacion)->format('m d, Y') }}
                                            hasta
                                            {{ \Carbon\Carbon::parse($concentracion->ano_cierre)->format('m d, Y') }}
                                        </td>

                                        <td>
                                            <a
                                                href="{{ route('concentracion_modificar', ['id' => $concentracion->id_concentracion]) }}">
                                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                            </a>
                                            <a
                                                href="{{ route('concentracion_eliminar', ['id' => $concentracion->id_concentracion]) }}">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que quieres borrar este registro?')">
                                                    Borrar
                                                </button>
                                            </a>
                                            <a
                                                href="{{ route('concentracion_detalle', ['id' => $concentracion->id_concentracion]) }}">
                                                <button type="button" class="btn btn-info">Detalle</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Mostrando {{ $concentraciones->firstItem() }} a {{ $concentraciones->lastItem() }}
                                    de {{ $concentraciones->total() }} concentraciones</small>
                            </div>
                            <div>
                                {{ $concentraciones->links('pagination::bootstrap-5') }}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
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

            // Establecer la fuente y tamaño (ajustar al tamaño de la página)
            doc.setFont("helvetica");
            doc.setFontSize(8);

            // Agregar título
            doc.text('Lista de Concentraciones', 10, 10);

            let y = 20; // Empieza debajo del título

            // Recorrer las filas de la tabla y agregar los datos al PDF
            Array.from(document.getElementById('concentraciones-table').rows).forEach((row, index) => {
                if (index === 0) return; // Salta la fila del encabezado

                const cells = row.cells;
                const rowData = [
                    cells[0].textContent, // #
                    cells[1].textContent, // ID
                    cells[2].textContent, // Clave
                    cells[3].textContent, // Nombre/Expediente
                    cells[4].textContent, // Fondo
                    cells[5].textContent, // Sección
                    cells[6].textContent  // Año
                ];

                // Formatear y escribir los datos en el PDF
                const rowText = rowData.join(' | ');
                doc.text(rowText, 10, y);
                y += 10; // Ajuste para la siguiente fila

                // Si la página está llena, se añade una nueva
                if (y > 270) {
                    doc.addPage();
                    y = 10;
                }
            });

            // Descargar el PDF
            doc.save('concentraciones_lista.pdf');
        });

        // Función para generar el archivo Excel
        document.getElementById('download-excel').addEventListener('click', function () {
            const table = document.getElementById('concentraciones-table');
            const wb = XLSX.utils.table_to_book(table, { sheet: 'Concentraciones' });

            // Descargar el archivo Excel
            XLSX.writeFile(wb, 'concentraciones_lista.xlsx');
        });
    </script>
@endsection
