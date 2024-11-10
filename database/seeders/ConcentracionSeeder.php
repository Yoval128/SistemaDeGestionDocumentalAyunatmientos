<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class ConcentracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Insertamos entre 10 a 15 registros para la tabla tb_concentracion
         \DB::table('tb_concentracion')->insert([
            [
                'clave' => 'C001',
                'nombre_expediente' => 'Expediente A-2024',
                'fondo' => 'Fondo Histórico',
                'seccion' => 'Sección 1',
                'subseccion' => 'Subsección A',
                'serie' => 'Serie 1',
                'subserie' => 'Subserie 1',
                'ano_creacion' => '2024-01-10',
                'ano_cierre' => '2024-12-10',
                'motivo_cierre' => 'Expediente finalizado',
                'legajos' => 100,
                'medida' => 15.75,
                'ubicacion_fisica' => 'Estante 1, Sección 1',
                'archivo_pdf' => 'expediente_a.pdf',
                'digitalizado' => 1, // Ya digitalizado
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clave' => 'C002',
                'nombre_expediente' => 'Expediente B-2024',
                'fondo' => 'Fondo Administrativo',
                'seccion' => 'Sección 2',
                'subseccion' => 'Subsección B',
                'serie' => 'Serie 2',
                'subserie' => 'Subserie 2',
                'ano_creacion' => '2024-02-15',
                'ano_cierre' => '2024-10-20',
                'motivo_cierre' => 'Cierre temporal por revisión',
                'legajos' => 150,
                'medida' => 25.50,
                'ubicacion_fisica' => 'Estante 2, Sección 2',
                'archivo_pdf' => 'expediente_b.pdf',
                'digitalizado' => 0, // No digitalizado aún
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clave' => 'C003',
                'nombre_expediente' => 'Expediente C-2023',
                'fondo' => 'Fondo Legal',
                'seccion' => 'Sección 1',
                'subseccion' => 'Subsección C',
                'serie' => 'Serie 3',
                'subserie' => 'Subserie 3',
                'ano_creacion' => '2023-03-05',
                'ano_cierre' => '2024-05-25',
                'motivo_cierre' => 'Expediente cerrado por resolución judicial',
                'legajos' => 75,
                'medida' => 10.25,
                'ubicacion_fisica' => 'Estante 1, Sección 3',
                'archivo_pdf' => 'expediente_c.pdf',
                'digitalizado' => 1, // Digitalizado
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clave' => 'C004',
                'nombre_expediente' => 'Expediente D-2022',
                'fondo' => 'Fondo de Investigación',
                'seccion' => 'Sección 3',
                'subseccion' => 'Subsección D',
                'serie' => 'Serie 4',
                'subserie' => 'Subserie 4',
                'ano_creacion' => '2022-07-20',
                'ano_cierre' => '2023-12-10',
                'motivo_cierre' => 'Expediente completado, se archivó',
                'legajos' => 200,
                'medida' => 40.10,
                'ubicacion_fisica' => 'Estante 3, Sección 2',
                'archivo_pdf' => 'expediente_d.pdf',
                'digitalizado' => 0, // No digitalizado
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clave' => 'C005',
                'nombre_expediente' => 'Expediente E-2023',
                'fondo' => 'Fondo Institucional',
                'seccion' => 'Sección 4',
                'subseccion' => 'Subsección E',
                'serie' => 'Serie 5',
                'subserie' => 'Subserie 5',
                'ano_creacion' => '2023-06-11',
                'ano_cierre' => '2024-01-05',
                'motivo_cierre' => 'Expediente completado por conclusión de actividad',
                'legajos' => 90,
                'medida' => 18.30,
                'ubicacion_fisica' => 'Estante 4, Sección 1',
                'archivo_pdf' => 'expediente_e.pdf',
                'digitalizado' => 1, // Digitalizado
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clave' => 'C006',
                'nombre_expediente' => 'Expediente F-2024',
                'fondo' => 'Fondo Proyectos',
                'seccion' => 'Sección 5',
                'subseccion' => 'Subsección F',
                'serie' => 'Serie 6',
                'subserie' => 'Subserie 6',
                'ano_creacion' => '2024-03-15',
                'ano_cierre' => '2024-09-30',
                'motivo_cierre' => 'Expediente cerrado por cancelación de proyecto',
                'legajos' => 120,
                'medida' => 20.75,
                'ubicacion_fisica' => 'Estante 5, Sección 1',
                'archivo_pdf' => 'expediente_f.pdf',
                'digitalizado' => 0, // No digitalizado
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clave' => 'C007',
                'nombre_expediente' => 'Expediente G-2024',
                'fondo' => 'Fondo Administrativo',
                'seccion' => 'Sección 2',
                'subseccion' => 'Subsección G',
                'serie' => 'Serie 7',
                'subserie' => 'Subserie 7',
                'ano_creacion' => '2024-04-25',
                'ano_cierre' => '2024-11-15',
                'motivo_cierre' => 'Expediente cerrado por auditoría interna',
                'legajos' => 60,
                'medida' => 12.50,
                'ubicacion_fisica' => 'Estante 2, Sección 2',
                'archivo_pdf' => 'expediente_g.pdf',
                'digitalizado' => 1, // Digitalizado
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'clave' => 'C008',
                'nombre_expediente' => 'Expediente H-2023',
                'fondo' => 'Fondo de Conservación',
                'seccion' => 'Sección 6',
                'subseccion' => 'Subsección H',
                'serie' => 'Serie 8',
                'subserie' => 'Subserie 8',
                'ano_creacion' => '2023-11-10',
                'ano_cierre' => '2024-01-20',
                'motivo_cierre' => 'Cierre por finalización de la conservación',
                'legajos' => 130,
                'medida' => 30.25,
                'ubicacion_fisica' => 'Estante 6, Sección 1',
                'archivo_pdf' => 'expediente_h.pdf',
                'digitalizado' => 0, // No digitalizado
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
