<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table = 'tb_areas';
    protected $primaryKey = 'id_area';
    protected $fillable = [
        'nombre',
        'descripccion',
        'activo'
    ];

    public function usuarioAreaRols()
    {
        return $this->hasMany(UsuarioAreaRol::class, 'id_area');
    }

    public function scopeBuscar($query, $buscar)
    {
        //dd("scope: " . $buscar);
        if (trim($buscar) != "") {
            $query->where(\DB::raw("CONCAT(id_area, '', nombre, '', descripccion, '')"), "LIKE", "%$buscar%");
        }
    }

    public function scopeTipo($query, $nombre)
    {
        if ($nombre != "") {
            $query->where('nombre', $nombre);
        }
    }
}
