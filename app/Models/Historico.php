<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    use HasFactory;
    protected $table = 'tb_historico';
    protected $primaryKey = 'id_historico';
    protected $fillable = [
        'id_usuario_asigando',
        'id_tramite',
        'tipo_documento',
        'valor_historico',
        'acceso_publico',
        'restricciones_acceso',
        'documentos_adjuntos',
    ];
}
