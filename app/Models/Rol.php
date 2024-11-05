<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'tb_roles';
    protected $primaryKey = 'id_rol';
    protected $fillable = [
        'nombre',
        'activo',
        'descripccion',
        'activo'

    ];

    public function usuarioAreaRols()
    {
        return $this->hasMany(UsuarioAreaRol::class, 'id_rol');
    }

}
