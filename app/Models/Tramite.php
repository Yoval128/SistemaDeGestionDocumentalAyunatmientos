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
        'id_area',
        'id_usuario',
        'fecha_inicio',
        'fecha_limite',
        'estado',
        'observaciones',
        'documentos_adjuntos',
    ];
}
