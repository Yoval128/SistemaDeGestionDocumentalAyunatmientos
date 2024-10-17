<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concentracion extends Model
{
    use HasFactory;
    protected $table = 'tb_concentracion';
    protected $primaryKey = 'id_concentracion';
    protected $fillable = [
        'calve',
        'nombre_expediente',
        'fondo',
        'seccion',
        'subseccion',
        'serie',
        'subserie',
        'ano_creacion',
        'ano_cierre',
        'motivo_cierre',
        'legajos',
        'medida',
        'descripccion',
        'ubicacion_fisica',
        'digitalizacion',
    ];
}
