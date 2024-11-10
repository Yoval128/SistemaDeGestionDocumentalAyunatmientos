<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    use HasFactory;
    protected $table = 'tb_tramite';
    protected $primaryKey = 'id_tramite';
    protected $fillable = [
        'id_area', // Clave foránea para el área del trámite.
        'id_usuario', // Usuario asignado al trámite.
        'fecha_inicio', // Fecha de inicio del trámite.
        'fecha_limite', // Fecha límite del trámite.
        'estado', // Estado actual del trámite.
        'observaciones', // Notas o comentarios del trámite.
        'documentos_adjuntos', // Documentos relacionados con el trámite
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area', 'id_area');
    }

    public function scopeBuscar($query, $buscar)
    {
        if (trim($buscar) != "") {
            $query->whereHas('usuario', function ($q) use ($buscar) {
                $q->whereRaw("CONCAT(nombre, ' ', apellidoP, ' ', apellidoM) LIKE ?", ["%$buscar%"]);
            })
                ->orWhereHas('area', function ($q) use ($buscar) {
                    $q->where('nombre', 'LIKE', "%$buscar%");
                })
                ->orWhere('estado', 'LIKE', "%$buscar%");
        }
    }

    
    public function scopeFechaInicio($query, $fecha_inicio)
    {
        if (!empty($fecha_inicio)) {
            // Filtra trámites cuya fecha de inicio es igual a la proporcionada
            $query->whereDate('fecha_inicio', '=', $fecha_inicio);
        }
    }
    
    public function scopeFechaLimite($query, $fecha_limite)
    {
        if (!empty($fecha_limite)) {
            // Filtra trámites cuya fecha límite es igual a la proporcionada
            $query->whereDate('fecha_limite', '=', $fecha_limite);
        }
    }
    

    public function scopeTipo($query, $nombre)
    {
        if ($nombre != "") {
            $query->where('id_usuario', $nombre);
        }
    }
}
