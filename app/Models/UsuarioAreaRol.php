<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioAreaRol extends Model
{
    use HasFactory;

    protected $table = 'tb_usuario_area_rol';
    protected $primaryKey = 'id_usuario_area_rol';
    protected $fillable = [
        'id_usuario',
        'id_area',
        'id_rol',
        'fecha_asignacion'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }
}
