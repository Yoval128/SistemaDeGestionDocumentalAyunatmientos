<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;
    protected $table = 'tb_sensor';
    protected $primaryKey = 'id_sensor';
    protected $fillable = [
        'temperatura',
        'humedad',
        'id_archivo',
    ];
}
