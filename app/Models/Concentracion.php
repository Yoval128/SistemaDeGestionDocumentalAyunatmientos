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
        'clave',
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
        'ubicacion_fisica',
        'archivo_pdf',
        'digitalizado',
    ];

    public function scopeBuscar($query, $buscar)
    {
        //dd("scope: " . $buscar);
        if (trim($buscar) != "") {
            $query->where(\DB::raw("CONCAT(clave, '', nombre_expediente, '', subseccion, '', serie, '', ano_creacion, '', ano_cierre, '','ubicacion_fisica','' ,'digitalizado')"), "LIKE", "%$buscar%");
        }
    }

    public function scopeTipo($query, $nombre)
    {
        if ($nombre != "") {
            $query->where('nombre_expediente', $nombre);
        }
    }

    public function scopeFechaInicio($query, $fecha_inicio)
    {
        if (!empty($fecha_inicio)) {
            // Filtra trámites cuya fecha de inicio es igual a la proporcionada
            $query->whereDate('ano_creacion', '=', $fecha_inicio);
        }
    }

    public function scopeFechaLimite($query, $fecha_limite)
    {
        if (!empty($fecha_limite)) {
            // Filtra trámites cuya fecha límite es igual a la proporcionada
            $query->whereDate('ano_cierre', '=', $fecha_limite);
        }
    }
}
