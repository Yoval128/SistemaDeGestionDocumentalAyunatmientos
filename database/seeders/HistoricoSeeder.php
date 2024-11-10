<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
class HistoricoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $historicos = [
            [
                'id_usuario_asigando' => 24,  // Usuario: Ilse Ventura
                'id_tramite' => 4,           // Tramite: 4
                'tipo_documento' => 'Revisión inicial',
                'valor_historico' => 'Se inició el proceso de revisión de documentos.',
                'acceso_publico' => 1,       // Acceso público: Sí
                'restricciones_acceso' => 'Solo personal autorizado.',
                'documentos_adjuntos' => '["documento1.pdf", "documento2.pdf"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario_asigando' => 26,  // Usuario: Ana González
                'id_tramite' => 5,           // Tramite: 5
                'tipo_documento' => 'Documentación adicional requerida',
                'valor_historico' => 'Se solicitó más documentación para continuar con el trámite.',
                'acceso_publico' => 0,       // Acceso público: No
                'restricciones_acceso' => 'Acceso solo para usuarios internos.',
                'documentos_adjuntos' => '["documento3.pdf"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario_asigando' => 30,  // Usuario: María López
                'id_tramite' => 6,           // Tramite: 6
                'tipo_documento' => 'Archivado',
                'valor_historico' => 'El trámite fue archivado correctamente.',
                'acceso_publico' => 1,       // Acceso público: Sí
                'restricciones_acceso' => 'Acceso libre.',
                'documentos_adjuntos' => '[]', // No hay documentos adjuntos
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario_asigando' => 29,  // Usuario: Beatriz Ramírez
                'id_tramite' => 7,           // Tramite: 7
                'tipo_documento' => 'Revisión de documentos',
                'valor_historico' => 'En espera de revisión por el equipo correspondiente.',
                'acceso_publico' => 1,       // Acceso público: Sí
                'restricciones_acceso' => 'Acceso solo a los administradores.',
                'documentos_adjuntos' => '["documento4.pdf"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario_asigando' => 34,  // Usuario: Victoria Vázquez
                'id_tramite' => 8,           // Tramite: 8
                'tipo_documento' => 'Calidad de digitalización',
                'valor_historico' => 'Verificación de calidad en el proceso de digitalización.',
                'acceso_publico' => 0,       // Acceso público: No
                'restricciones_acceso' => 'Acceso solo a los supervisores de calidad.',
                'documentos_adjuntos' => '["documento5.pdf"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario_asigando' => 38,  // Usuario: Fernando Alvarado
                'id_tramite' => 9,           // Tramite: 9
                'tipo_documento' => 'Tecnología',
                'valor_historico' => 'Se está esperando la nueva tecnología para continuar.',
                'acceso_publico' => 0,       // Acceso público: No
                'restricciones_acceso' => 'Solo personal de tecnología.',
                'documentos_adjuntos' => '["documento6.pdf"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario_asigando' => 32,  // Usuario: Elena Sánchez
                'id_tramite' => 10,           // Tramite: 10
                'tipo_documento' => 'Seguridad completada',
                'valor_historico' => 'Proceso de seguridad completado y archivado.',
                'acceso_publico' => 1,       // Acceso público: Sí
                'restricciones_acceso' => 'Acceso libre.',
                'documentos_adjuntos' => '["documento7.pdf"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario_asigando' => 33,  // Usuario: Mario Rodríguez
                'id_tramite' => 11,           // Tramite: 11
                'tipo_documento' => 'Consulta pendiente',
                'valor_historico' => 'Esperando la aprobación de consulta.',
                'acceso_publico' => 1,       // Acceso público: Sí
                'restricciones_acceso' => 'Acceso público.',
                'documentos_adjuntos' => '[]', // No hay documentos adjuntos
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario_asigando' => 40,  // Usuario: Raquel Mendoza
                'id_tramite' => 12,           // Tramite: 12
                'tipo_documento' => 'Conservación en marcha',
                'valor_historico' => 'El proceso de conservación está en marcha.',
                'acceso_publico' => 0,       // Acceso público: No
                'restricciones_acceso' => 'Solo para los encargados de conservación.',
                'documentos_adjuntos' => '["documento8.pdf"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_usuario_asigando' => 36,  // Usuario: Pedro Fernández
                'id_tramite' => 13,           // Tramite: 13
                'tipo_documento' => 'Firma pendiente',
                'valor_historico' => 'Esperando la firma de documentos legales.',
                'acceso_publico' => 0,       // Acceso público: No
                'restricciones_acceso' => 'Acceso solo para los firmantes.',
                'documentos_adjuntos' => '["documento9.pdf"]',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insertar los datos en la base de datos
        DB::table('tb_historico')->insert($historicos);
    }
}
