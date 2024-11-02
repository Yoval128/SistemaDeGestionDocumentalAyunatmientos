<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable 
{
    use HasFactory, Notifiable; 

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

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
