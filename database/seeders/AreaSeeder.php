<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    public function run()
    {
        $areas = [
            ['nombre' => 'Archivo General', 'descripccion' => 'Área responsable de la supervisión y control de todos los documentos y archivos del sistema.', 'activo' => 1],
            ['nombre' => 'Trámite', 'descripccion' => 'Encargada de gestionar y almacenar documentos activos que están en proceso o pendientes de resolución.', 'activo' => 1],
            ['nombre' => 'Concentración', 'descripccion' => 'Dedicada a documentos que han finalizado su ciclo activo, pero deben conservarse por razones legales o administrativas.', 'activo' => 1],
            ['nombre' => 'Histórico', 'descripccion' => 'Área para almacenar documentos de valor histórico o permanente, que ya no tienen valor administrativo pero sí histórico o cultural.', 'activo' => 1],
            ['nombre' => 'Administración', 'descripccion' => 'Encargada de la gestión de usuarios, roles y permisos de acceso.', 'activo' => 1],
            ['nombre' => 'Control de Calidad', 'descripccion' => 'Área que verifica la correcta digitalización y gestión de documentos.', 'activo' => 1],
            ['nombre' => 'Tecnología e Innovación', 'descripccion' => 'Responsable de la integración de nuevas tecnologías, como el monitoreo de temperatura y humedad.', 'activo' => 1],
            ['nombre' => 'Seguridad de Información', 'descripccion' => 'Área que se ocupa de la protección y confidencialidad de los documentos y el acceso seguro.', 'activo' => 1],
            ['nombre' => 'Consulta Pública', 'descripccion' => 'Sección para la consulta de documentos por parte de usuarios autorizados o el público en general, si procede.', 'activo' => 1],
            ['nombre' => 'Preservación y Conservación', 'descripccion' => 'Área enfocada en las actividades para preservar y conservar los documentos físicos y digitales.', 'activo' => 1],
            ['nombre' => 'Legal', 'descripccion' => 'Encargada de los documentos con implicaciones legales o jurídicas, como contratos, resoluciones y convenios.', 'activo' => 1],
            ['nombre' => 'Gestión de Proyectos', 'descripccion' => 'Para el seguimiento de proyectos documentales específicos y su avance.', 'activo' => 1],
        ];

        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
