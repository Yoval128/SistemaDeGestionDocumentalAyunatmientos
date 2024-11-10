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

    public function scopeBuscar($query, $buscar)
    {
        //dd("scope: " . $buscar);
        if (trim($buscar) != "") {
            $query->where(\DB::raw("CONCAT(id_rol, '', nombre, '', descripccion, '')"), "LIKE", "%$buscar%");
        }
    }

    public function scopeTipo($query, $nombre)
    {
        if ($nombre != "") {
            $query->where('nombre', $nombre);
        }
    }
}
