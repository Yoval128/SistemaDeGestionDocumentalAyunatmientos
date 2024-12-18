@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Históricos</h3>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('historico_alta') }}">
                                <button type="button" class="btn btn-warning">Nuevo Registro</button>
                            </a>

                            <form action="{{ route('historico_index') }}" method="GET" class="d-flex align-items-center">
                                {{ csrf_field() }}

                                <div class="form-floating me-2">
                                    <input type="text" class="form-control" name="buscar" value="{{ old('buscar') }}"
                                        id="floatingBuscar" placeholder="ejemplo: Roberto Vinicio"
                                        aria-describedby="buscarHelp">
                                    <label for="floatingBuscar">Buscar</label>
                                    <div id="buscarHelp" class="form-text">
                                        @if ($errors->first('buscar'))
                                            <small class="text-danger">{{ $errors->first('buscar') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Buscar</button>

                                <a href="{{ route('historico_index') }}">
                                    <button type="button" class="btn btn-danger">Reiniciar</button>
                                </a>
                            </form>
                        </div>

                        <!-- Botones para generar PDF y Excel -->
                        <button id="download-pdf" class="btn btn-primary mb-3">Descargar PDF</button>
                        <button id="download-excel" class="btn btn-success mb-3">Descargar Excel</button>

                        <table id="historicos-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Usuario Asignado</th>
                                    <th>Trámite</th>
                                    <th>Tipo de Documento</th>
                                    <th>Valor Histórico</th>
                                    <th>Acceso Público</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($historicos->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">No hay registros disponibles.</td>
                                    </tr>
                                @else
<<<<<<< HEAD
=======
<<<<<<< HEAD
                                @foreach ($datos as $key => $historico)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $historico->id_historico }}</td>
                                    <td>{{ $historico->usuario_nombre }} {{ $historico->usuario_apellidoP }} {{ $historico->usuario_apellidoM }}</td>
                                    <td>{{ $historico->descripcion_tramite }}</td>
                                    <td>{{ $historico->tipo_documento }}</td>
                                    <td>{{ $historico->valor_historico }}</td>
                                    <td>{{ $historico->acceso_publico ? 'Sí' : 'No' }}</td>
                                    <td>
                                        <a href="{{ route('historico_modificar', ['id' => $historico->id_historico]) }}">
                                            <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                        </a>
                                        <a href="{{ route('historico_eliminar', ['id' => $historico->id_historico]) }}">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres borrar este registro?')">Borrar</button>
                                        </a>
                                        <a href="{{ route('historico_detalle', ['id' => $historico->id_historico]) }}">
                                            <button type="button" class="btn btn-info">Detalle</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
=======
>>>>>>> origin/main
                                    @foreach ($historicos as $key => $historico)
                                        <tr>
                                            <td>{{ $historicos->firstItem() + $key }}</td>
                                            <td>{{ $historico->id_historico }}</td>
                                            <td>{{ $historico->usuario->nombre }} {{ $historico->usuario->apellidoP }} {{ $historico->usuario->apellidoM }}</td>
                                            <td>
                                                @if ($historico->tramite)
                                                    {{ $historico->tramite->descripcion }}
                                                @else
                                                    <span class="text-muted">Sin trámite asignado</span>
                                                @endif
                                            </td>
                                            <td>{{ $historico->tipo_documento }}</td>
                                            <td>{{ $historico->valor_historico }}</td>
                                            <td>{{ $historico->acceso_publico ? 'Sí' : 'No' }}</td>
                                            <td>
                                                <a href="{{ route('historico_modificar', ['id' => $historico->id_historico]) }}">
                                                    <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                                </a>
                                                <a href="{{ route('historico_eliminar', ['id' => $historico->id_historico]) }}">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Seguro que quieres borrar este registro?')">
                                                        Borrar
                                                    </button>
                                                </a>
                                                <a href="{{ route('historico_detalle', ['id' => $historico->id_historico]) }}">
                                                    <button type="button" class="btn btn-info">Detalle</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
<<<<<<< HEAD
=======
>>>>>>> origin/main
>>>>>>> origin/main
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Mostrando {{ $historicos->firstItem() }} a {{ $historicos->lastItem() }}
                                    de {{ $historicos->total() }} registros</small>
                            </div>
                            <div>
                                {{ $historicos->links('pagination::bootstrap-5') }}
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
            doc.setFont("helvetica");
            doc.setFontSize(10);

            // Agregar título
            doc.text('Lista de Históricos', 10, 10);
            let y = 20;

            // Obtener las filas de la tabla
            const table = document.getElementById('historicos-table');
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach((row, index) => {
                const cells = row.cells;
                const rowData = [
                    cells[0].textContent, // #
                    cells[1].textContent, // ID
                    cells[2].textContent, // Usuario Asignado
                    cells[3].textContent, // Trámite
                    cells[4].textContent, // Tipo de Documento
                    cells[5].textContent, // Valor Histórico
                    cells[6].textContent  // Acceso Público
                ];

                // Formatear y escribir los datos en el PDF
                const rowText = rowData.join(' | ');
                doc.text(rowText, 10, y);
                y += 10;

                // Si la página está llena, agregar una nueva
                if (y > 270) {
                    doc.addPage();
                    y = 10;
                }
            });

            // Descargar el PDF
            doc.save('historicos_lista.pdf');
        });

        // Función para generar el archivo Excel
        document.getElementById('download-excel').addEventListener('click', function () {
            const table = document.getElementById('historicos-table');
            const wb = XLSX.utils.table_to_book(table, { sheet: 'Históricos' });
            XLSX.writeFile(wb, 'historicos_lista.xlsx');
        });
    </script>
@endsection
