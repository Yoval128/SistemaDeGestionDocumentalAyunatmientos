
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            // Jefe de Archivo General
            [
                'nombre' => 'Ilse',
                'apellidoP' => 'Ventura',
                'apellidoM' => 'Calixto',
                'sexo' => 'Femenino',
                'fecha_nacimiento' => '1975-03-25',
                'email' => 'admin@ayuntamiento.com.mx',
                'password' => Hash::make('admin'), 
                'rol' => 'Jefe de archivo general',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'José',
                'apellidoP' => 'Martínez',
                'apellidoM' => 'Pérez',
                'sexo' => 'Masculino',
                'fecha_nacimiento' => '1982-11-05',
                'email' => 'jose.martinez@ayuntamiento.com.mx',
                'password' => Hash::make('admin123'), 
                'rol' => 'Jefe de archivo general',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Empleado de Trámite
            [
                'nombre' => 'Ana',
                'apellidoP' => 'González',
                'apellidoM' => 'Ruiz',
                'sexo' => 'Femenino',
                'fecha_nacimiento' => '1992-06-10',
                'email' => 'ana.gonzalez@ayuntamiento.com.mx',
                'password' => Hash::make('tramite123'), 
                'rol' => 'Empleado de Trámite',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Luis',
                'apellidoP' => 'Suárez',
                'apellidoM' => 'Vázquez',
                'sexo' => 'Masculino',
                'fecha_nacimiento' => '1995-01-17',
                'email' => 'luis.suarez@ayuntamiento.com.mx',
                'password' => Hash::make('tramite123'), 
                'rol' => 'Empleado de Trámite',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Empleado de Concentración
            [
                'nombre' => 'Carlos',
                'apellidoP' => 'Pérez',
                'apellidoM' => 'Torres',
                'sexo' => 'Masculino',
                'fecha_nacimiento' => '1988-09-14',
                'email' => 'carlos.perez@ayuntamiento.com.mx',
                'password' => Hash::make('concentracion123'), 
                'rol' => 'Empleado de Concentración',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Beatriz',
                'apellidoP' => 'Ramírez',
                'apellidoM' => 'Gutiérrez',
                'sexo' => 'Femenino',
                'fecha_nacimiento' => '1986-12-30',
                'email' => 'beatriz.ramirez@ayuntamiento.com.mx',
                'password' => Hash::make('concentracion123'), 
                'rol' => 'Empleado de Concentración',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Empleado de Histórico
            [
                'nombre' => 'María',
                'apellidoP' => 'Lopez',
                'apellidoM' => 'Martínez',
                'sexo' => 'Femenino',
                'fecha_nacimiento' => '1990-08-10',
                'email' => 'maria.lopez@ayuntamiento.com.mx',
                'password' => Hash::make('historial123'), 
                'rol' => 'Empleado de Histórico',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Carlos',
                'apellidoP' => 'Hernández',
                'apellidoM' => 'Sánchez',
                'sexo' => 'Masculino',
                'fecha_nacimiento' => '1985-02-20',
                'email' => 'carlos.hernandez@ayuntamiento.com.mx',
                'password' => Hash::make('historial123'), 
                'rol' => 'Empleado de Histórico',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Administrador de Usuarios
            [
                'nombre' => 'Elena',
                'apellidoP' => 'Sánchez',
                'apellidoM' => 'Cabrera',
                'sexo' => 'Femenino',
                'fecha_nacimiento' => '1983-07-22',
                'email' => 'elena.sanchez@ayuntamiento.com.mx',
                'password' => Hash::make('adminusuarios123'), 
                'rol' => 'Administrador de Usuarios',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Mario',
                'apellidoP' => 'Rodríguez',
                'apellidoM' => 'Alvarez',
                'sexo' => 'Masculino',
                'fecha_nacimiento' => '1978-04-12',
                'email' => 'mario.rodriguez@ayuntamiento.com.mx',
                'password' => Hash::make('adminusuarios123'), 
                'rol' => 'Administrador de Usuarios',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Supervisor de Calidad
            [
                'nombre' => 'Victoria',
                'apellidoP' => 'Vázquez',
                'apellidoM' => 'Pérez',
                'sexo' => 'Femenino',
                'fecha_nacimiento' => '1984-02-05',
                'email' => 'victoria.vazquez@ayuntamiento.com.mx',
                'password' => Hash::make('calidad123'), 
                'rol' => 'Supervisor de Calidad',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Raúl',
                'apellidoP' => 'González',
                'apellidoM' => 'Cruz',
                'sexo' => 'Masculino',
                'fecha_nacimiento' => '1993-11-19',
                'email' => 'raul.gonzalez@ayuntamiento.com.mx',
                'password' => Hash::make('calidad123'), 
                'rol' => 'Supervisor de Calidad',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Consultor
            [
                'nombre' => 'Pedro',
                'apellidoP' => 'Fernández',
                'apellidoM' => 'Gómez',
                'sexo' => 'Masculino',
                'fecha_nacimiento' => '1987-06-25',
                'email' => 'pedro.fernandez@consultor.com.mx',
                'password' => Hash::make('consultor123'), 
                'rol' => 'Consultor',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Sofía',
                'apellidoP' => 'Ramírez',
                'apellidoM' => 'López',
                'sexo' => 'Femenino',
                'fecha_nacimiento' => '1994-09-18',
                'email' => 'sofia.ramirez@consultor.com.mx',
                'password' => Hash::make('consultor123'), 
                'rol' => 'Consultor',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Empleado de Tecnología
            [
                'nombre' => 'Fernando',
                'apellidoP' => 'Alvarado',
                'apellidoM' => 'Salazar',
                'sexo' => 'Masculino',
                'fecha_nacimiento' => '1991-01-08',
                'email' => 'fernando.alvarado@tecnologia.com.mx',
                'password' => Hash::make('tecnologia123'), 
                'rol' => 'Empleado de Tecnología',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Lucía',
                'apellidoP' => 'Castillo',
                'apellidoM' => 'Martínez',
                'sexo' => 'Femenino',
                'fecha_nacimiento' => '1989-12-15',
                'email' => 'lucia.castillo@tecnologia.com.mx',
                'password' => Hash::make('tecnologia123'), 
                'rol' => 'Empleado de Tecnología',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Investigador/Historiador
            [
                'nombre' => 'Raquel',
                'apellidoP' => 'Mendoza',
                'apellidoM' => 'Fuentes',
                'sexo' => 'Femenino',
                'fecha_nacimiento' => '1984-03-02',
                'email' => 'raquel.mendoza@investigador.com.mx',
                'password' => Hash::make('historiador123'), 
                'rol' => 'Investigador/Historiador',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Juan',
                'apellidoP' => 'Gutiérrez',
                'apellidoM' => 'Salazar',
                'sexo' => 'Masculino',
                'fecha_nacimiento' => '1990-05-25',
                'email' => 'juan.gutierrez@investigador.com.mx',
                'password' => Hash::make('historiador123'), 
                'rol' => 'Investigador/Historiador',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            // Usuario Externo Autorizado
            [
                'nombre' => 'Luis',
                'apellidoP' => 'Torres',
                'apellidoM' => 'Paredes',
                'sexo' => 'Masculino',
                'fecha_nacimiento' => '2000-10-10',
                'email' => 'luis.torres@externo.com.mx',
                'password' => Hash::make('externo123'), 
                'rol' => 'Usuario Externo Autorizado',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nombre' => 'Clara',
                'apellidoP' => 'Hernández',
                'apellidoM' => 'González',
                'sexo' => 'Femenino',
                'fecha_nacimiento' => '1998-03-18',
                'email' => 'clara.hernandez@externo.com.mx',
                'password' => Hash::make('externo123'), 
                'rol' => 'Usuario Externo Autorizado',
                'foto' => 'foto_default.jpg',
                'activo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        foreach ($usuarios as $usuario) {
            Usuario::create($usuario);
        }
    }
}
