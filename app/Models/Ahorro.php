<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ahorro extends Model
{
    use HasFactory;
    protected $table = 'solicitudes_ahorro';
    protected $fillable = [
        'id',
        'folio',
        'monto_semanal',
        'gmin_solicitante',
        'status',
    ];

}
