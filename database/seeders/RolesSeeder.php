<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rol; // Asegúrate de tener el modelo Rol

class RolesSeeder extends Seeder
{

    /**
     * Ejecutar la siembra de la base de datos.
     *
     * @return void
     */

    public function run()
    {
        $roles = [
            [
                'nombre' => 'Jefe de Archivo General',
                'descripccion' => 'Responsable de la supervisión global del sistema de gestión documental. Tiene acceso completo para crear, editar, eliminar y supervisar todos los documentos y expedientes en las áreas de trámite, concentración e histórico. También gestiona la asignación de roles y usuarios.',
                'activo' => true,
            ],
            [
                'nombre' => 'Empleado de Trámite',
                'descripccion' => 'Encargado de gestionar los documentos activos en la fase de trámite. Puede registrar nuevos expedientes, actualizarlos y agregar observaciones o documentos adjuntos. Tiene acceso limitado solo a la vista de los documentos en trámite.',
                'activo' => true,
            ],
            [
                'nombre' => 'Empleado de Concentración',
                'descripccion' => 'Gestiona los expedientes que han terminado su ciclo activo y han pasado a la fase de concentración. Puede registrar el cierre de trámites, digitalizar expedientes y asignar ubicaciones físicas. No tiene acceso a la creación ni edición de documentos en trámite o histórico.',
                'activo' => true,
            ],
            [
                'nombre' => 'Empleado de Histórico',
                'descripccion' => 'Maneja documentos de valor histórico y se encarga de su clasificación, descripción y acceso. Puede registrar documentos históricos, agregar información sobre su valor histórico y establecer restricciones de acceso. No puede modificar expedientes en trámite o concentración.',
                'activo' => true,
            ],
            [
                'nombre' => 'Administrador de Usuarios',
                'descripccion' => 'Gestiona la creación, edición y eliminación de usuarios y asignación de roles. Tiene acceso a las funcionalidades relacionadas con la administración de cuentas y control de accesos.',
                'activo' => true,
            ],
            [
                'nombre' => 'Supervisor de Calidad',
                'descripccion' => 'Revisa y aprueba la calidad de los documentos digitalizados y su correcto almacenamiento en el sistema. Puede devolver expedientes para correcciones o dar el visto bueno para su paso a la siguiente fase.',
                'activo' => true,
            ],
            [
                'nombre' => 'Consultor',
                'descripccion' => 'Usuario con acceso de solo lectura a expedientes específicos, principalmente para auditorías o revisiones. Puede consultar documentos en las áreas de trámite, concentración e histórico, pero no puede realizar modificaciones.',
                'activo' => true,
            ],
            [
                'nombre' => 'Empleado de Tecnología',
                'descripccion' => 'Gestiona el módulo de monitoreo de temperatura y humedad y se encarga de la integración de datos provenientes de dispositivos IoT como Arduino. También colabora con el mantenimiento y actualización de las funcionalidades técnicas del sistema.',
                'activo' => true,
            ],
            [
                'nombre' => 'Investigador/Historiador',
                'descripccion' => 'Usuario especializado que puede acceder a documentos históricos con permisos especiales. Tiene la capacidad de consultar y solicitar acceso a documentos con restricciones.',
                'activo' => true,
            ],
            [
                'nombre' => 'Usuario Externo Autorizado',
                'descripccion' => 'Accede solo a documentos públicos o autorizados para consulta, ideal para ciudadanos o investigadores externos. Tiene un acceso limitado y controlado, sin permisos de edición.',
                'activo' => true,
            ],
        ];

        foreach ($roles as $role) {
            Rol::create($role);
        }
    }
}
