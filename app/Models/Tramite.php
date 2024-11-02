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
}
