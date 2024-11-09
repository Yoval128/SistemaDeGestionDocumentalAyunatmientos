@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Usuarios</h3>

                        <a href="{{ route('usuario_alta') }}">
                            <button type="button" class="btn btn-warning mb-3">Nuevo Registro RAT</button>
                        </a>

                        <button id="download-pdf" class="btn btn-primary mb-3">Descargar PDF</button>
                        <button id="download-excel" class="btn btn-success mb-3">Descargar Excel</button>

                        <table id="usuarios-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuario as $key => $usuarios)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $usuarios->id_usuario }}</td>
                                        <td><img src="{{ 'img/' . $usuarios->foto }}" style="width: 50px; height:50px;"></td>
                                        <td>{{ $usuarios->nombre }}</td>
                                        <td>{{ $usuarios->apellidoP . ' ' . $usuarios->apellidoM }}</td>
                                        <td>{{ $usuarios->email }}</td>
                                        <td>{{ $usuarios->rol }}</td>
                                        <td>
                                            <a href="{{ route('usuario_modificar', ['id' => $usuarios->id_usuario]) }}">
                                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                            </a>
                                            <a href="{{ route('usuario_eliminar', ['id' => $usuarios->id_usuario]) }}">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres borrar este registro?')">Borrar</button>
                                            </a>
                                            <a href="{{ route('usuario_detalle', ['id' => $usuarios->id_usuario]) }}">
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
            doc.text('Lista de Usuarios', 10, 10);

            let y = 20; // Empieza debajo del título

            // Recorrer las filas de la tabla y agregar los datos al PDF
            Array.from(document.getElementById('usuarios-table').rows).forEach((row, index) => {
                if (index === 0) return; // Salta la fila del encabezado

                const cells = row.cells;
                const rowData = [
                    cells[0].textContent, // #
                    cells[1].textContent, // Id
                    cells[2].textContent, // Foto (puedes omitir o poner un texto aquí)
                    cells[3].textContent, // Nombre
                    cells[4].textContent, // Apellido
                    cells[5].textContent, // Email
                    cells[6].textContent  // Rol
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
            doc.save('usuarios_lista.pdf');
        });

        // Función para generar el archivo Excel
        document.getElementById('download-excel').addEventListener('click', function () {
            const table = document.getElementById('usuarios-table');
            const wb = XLSX.utils.table_to_book(table, { sheet: 'Usuarios' });

            // Descargar el archivo Excel
            XLSX.writeFile(wb, 'usuarios_lista.xlsx');
        });
    </script>
@endsection
