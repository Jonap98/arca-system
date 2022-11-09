<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAhorro extends Model
{
    use HasFactory;
    protected $table = 'detalle_ahorro';
    protected $fillable = [
        'id',
        'folio',
        'monto_semanal',
        'semana',
        'gmin_solicitante',
    ];
}
