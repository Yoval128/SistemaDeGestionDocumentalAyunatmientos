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

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_asigando');
    }

    public function tramite()
    {
        return $this->belongsTo(Tramite::class, 'id_tramite');
    }

    public function scopeBuscar($query, $buscar)
    {
        if (trim($buscar) != "") {
            $query->whereHas('usuario', function($q) use ($buscar) {
                $q->whereRaw("CONCAT(nombre, ' ', apellidoP, ' ', apellidoM) LIKE ?", ["%$buscar%"]);
            })
            ->orWhereHas('tramite', function($q) use ($buscar) {
                $q->where('estado', 'LIKE', "%$buscar%");
            })
            ->orWhere('acceso_publico', 'LIKE', "%$buscar%");
        }
    }
    
    public function scopeTipo($query, $nombre)
    {
        if ($nombre != "") {
            $query->where('tipo_documento', $nombre);
        }
    }
}
