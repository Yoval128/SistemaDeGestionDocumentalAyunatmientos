<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Cambia esto
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable // Cambia 'Model' a 'Authenticatable'
{
    use HasFactory, Notifiable; // Asegúrate de incluir Notifiable si necesitas notificaciones

    protected $table = 'tb_usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'sexo',
        'fecha_nacimiento',
        'email',
        'password',
        'rol',
        'foto',
        'activo',
    ];

    // Si necesitas configurar la contraseña como oculto
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
