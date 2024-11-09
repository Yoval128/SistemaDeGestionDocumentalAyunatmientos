@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Trámites</h3>

                        <a href="{{ route('tramite_alta') }}">
                            <button type="button" class="btn btn-warning mb-3">Nuevo Registro de Trámite</button>
                        </a>

                        <!-- Botones para generar PDF y Excel -->
                        <button id="download-pdf" class="btn btn-primary mb-3">Descargar PDF</button>
                        <button id="download-excel" class="btn btn-success mb-3">Descargar Excel</button>

                        <table id="tramites-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Área</th>
                                    <th>Usuario</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha Límite</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $key => $tramites)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $tramites->id_tramite }}</td>
                                        <td>{{ $tramites->area_nombre }}</td>
                                        <td>{{ $tramites->usuario_nombre }} {{ $tramites->usuario_apellidoP }} {{ $tramites->usuario_apellidoM }}</td>
                                        <td>{{ $tramites->fecha_inicio }}</td>
                                        <td>{{ $tramites->fecha_limite }}</td>
                                        <td>{{ $tramites->estado }}</td>
                                        <td>
                                            <a href="{{ route('tramite_modificar', ['id' => $tramites->id_tramite]) }}">
                                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                            </a>
                                            <a href="{{ route('tramite_eliminar', ['id' => $tramites->id_tramite]) }}">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres borrar este registro?')">Borrar</button>
                                            </a>
                                            <a href="{{ route('tramite_detalle', ['id' => $tramites->id_tramite]) }}">
                                                <button type="button" class="btn btn-info">Detalle</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
            doc.text('Lista de Trámites', 10, 10);

            let y = 20; // Empieza debajo del título

            // Recorrer las filas de la tabla y agregar los datos al PDF
            Array.from(document.getElementById('tramites-table').rows).forEach((row, index) => {
                if (index === 0) return; // Salta la fila del encabezado

                const cells = row.cells;
                const rowData = [
                    cells[0].textContent, // #
                    cells[1].textContent, // ID
                    cells[2].textContent, // Área
                    cells[3].textContent, // Usuario
                    cells[4].textContent, // Fecha de Inicio
                    cells[5].textContent, // Fecha Límite
                    cells[6].textContent  // Estado
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
            doc.save('tramites_lista.pdf');
        });

        // Función para generar el archivo Excel
        document.getElementById('download-excel').addEventListener('click', function () {
            const table = document.getElementById('tramites-table');
            const wb = XLSX.utils.table_to_book(table, { sheet: 'Trámites' });

            // Descargar el archivo Excel
            XLSX.writeFile(wb, 'tramites_lista.xlsx');
        });
    </script>
@endsection
