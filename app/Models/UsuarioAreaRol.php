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

    public function scopeBuscar($query, $buscar)
    {
        if (trim($buscar) != "") {
            $query->where(function($query) use ($buscar) {
                $query->whereHas('usuario', function($query) use ($buscar) {
                    // Buscamos en el nombre completo del usuario
                    $query->where(\DB::raw('CONCAT(nombre, " ", apellidoP, " ", apellidoM)'), 'LIKE', "%$buscar%");
                })
                ->orWhereHas('area', function($query) use ($buscar) {
                    // Buscamos en el nombre del área
                    $query->where('nombre', 'LIKE', "%$buscar%");
                })
                ->orWhereHas('rol', function($query) use ($buscar) {
                    // Buscamos en el nombre del rol
                    $query->where('nombre', 'LIKE', "%$buscar%");
                });
            });
        }
    }
    
    public function scopeTipo($query, $nombre)
    {
        if ($nombre != "") {
            $query->where('id_usuario', 'LIKE', "%$nombre%");
        }
    }
}
