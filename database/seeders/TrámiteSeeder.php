<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TrámiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('tb_tramite')->insert([
            [
                'id_area' => 1, // Archivo General
                'id_usuario' => 24, // Ilse Ventura (Jefe de archivo general)
                'fecha_inicio' => '2024-11-05',
                'fecha_limite' => '2024-11-12',
                'estado' => 'Pendiente',
                'observaciones' => 'Proceso de revisión inicial',
                'documentos_adjuntos' => json_encode(['documento1.pdf', 'documento2.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 2, // Trámite
                'id_usuario' => 26, // Ana González (Empleado de Trámite)
                'fecha_inicio' => '2024-11-06',
                'fecha_limite' => '2024-11-15',
                'estado' => 'En proceso',
                'observaciones' => 'Requiere más documentación',
                'documentos_adjuntos' => json_encode(['documento3.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 4, // Histórico
                'id_usuario' => 30, // María Lopez (Empleado de Histórico)
                'fecha_inicio' => '2024-11-07',
                'fecha_limite' => '2024-11-20',
                'estado' => 'Finalizado',
                'observaciones' => 'Archivado correctamente',
                'documentos_adjuntos' => json_encode([]), // Sin documentos adjuntos
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 3, // Concentración
                'id_usuario' => 29, // Beatriz Ramírez (Empleado de Concentración)
                'fecha_inicio' => '2024-11-08',
                'fecha_limite' => '2024-11-12',
                'estado' => 'Pendiente',
                'observaciones' => 'En espera de revisión',
                'documentos_adjuntos' => json_encode(['documento4.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 6, // Control de Calidad
                'id_usuario' => 34, // Victoria Vázquez (Supervisor de Calidad)
                'fecha_inicio' => '2024-11-09',
                'fecha_limite' => '2024-11-18',
                'estado' => 'En proceso',
                'observaciones' => 'Verificando la calidad de digitalización',
                'documentos_adjuntos' => json_encode(['documento5.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 7, // Tecnología e Innovación
                'id_usuario' => 38, // Fernando Alvarado (Empleado de Tecnología)
                'fecha_inicio' => '2024-11-10',
                'fecha_limite' => '2024-11-17',
                'estado' => 'Pendiente',
                'observaciones' => 'A la espera de nueva tecnología',
                'documentos_adjuntos' => json_encode(['documento6.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 8, // Seguridad de Información
                'id_usuario' => 32, // Elena Sánchez (Administrador de Usuarios)
                'fecha_inicio' => '2024-11-11',
                'fecha_limite' => '2024-11-25',
                'estado' => 'Finalizado',
                'observaciones' => 'Proceso de seguridad completado',
                'documentos_adjuntos' => json_encode(['documento7.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 9, // Consulta Pública
                'id_usuario' => 33, // Mario Rodríguez (Administrador de Usuarios)
                'fecha_inicio' => '2024-11-12',
                'fecha_limite' => '2024-11-22',
                'estado' => 'Pendiente',
                'observaciones' => 'Esperando la aprobación de consulta',
                'documentos_adjuntos' => json_encode([]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 10, // Preservación y Conservación
                'id_usuario' => 28, // Carlos Pérez (Empleado de Concentración)
                'fecha_inicio' => '2024-11-13',
                'fecha_limite' => '2024-11-30',
                'estado' => 'En proceso',
                'observaciones' => 'Proceso de conservación en marcha',
                'documentos_adjuntos' => json_encode(['documento8.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 11, // Legal
                'id_usuario' => 36, // Pedro Fernández (Consultor)
                'fecha_inicio' => '2024-11-14',
                'fecha_limite' => '2024-11-21',
                'estado' => 'Pendiente',
                'observaciones' => 'Esperando firma de documentos legales',
                'documentos_adjuntos' => json_encode(['documento9.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 5, // Administración
                'id_usuario' => 34, // Victoria Vázquez (Supervisor de Calidad)
                'fecha_inicio' => '2024-11-15',
                'fecha_limite' => '2024-11-30',
                'estado' => 'En proceso',
                'observaciones' => 'Gestión de permisos de usuario en progreso',
                'documentos_adjuntos' => json_encode(['documento10.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 12, // Gestión de Proyectos
                'id_usuario' => 40, // Raquel Mendoza (Investigador/Historiador)
                'fecha_inicio' => '2024-11-16',
                'fecha_limite' => '2024-11-25',
                'estado' => 'Finalizado',
                'observaciones' => 'Proyecto documental finalizado exitosamente',
                'documentos_adjuntos' => json_encode(['documento11.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 2, // Trámite
                'id_usuario' => 25, // José Martínez (Jefe de archivo general)
                'fecha_inicio' => '2024-11-17',
                'fecha_limite' => '2024-11-22',
                'estado' => 'Pendiente',
                'observaciones' => 'Requiere validación de documentos',
                'documentos_adjuntos' => json_encode(['documento12.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 1, // Archivo General
                'id_usuario' => 27, // Luis Suárez (Empleado de Trámite)
                'fecha_inicio' => '2024-11-18',
                'fecha_limite' => '2024-11-28',
                'estado' => 'Pendiente',
                'observaciones' => 'Documentos archivados parcialmente',
                'documentos_adjuntos' => json_encode(['documento13.pdf']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_area' => 4, // Histórico
                'id_usuario' => 31, // Carlos Hernández (Empleado de Histórico)
                'fecha_inicio' => '2024-11-19',
                'fecha_limite' => '2024-11-26',
                'estado' => 'Finalizado',
                'observaciones' => 'Proceso de archivo histórico completado',
                'documentos_adjuntos' => json_encode([]), // Sin documentos adjuntos
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
