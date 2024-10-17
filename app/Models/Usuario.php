<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
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
}
