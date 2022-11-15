<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $table = 'solicitudes_prestamo';
    protected $fillable = [
        'id',
        'gmin_solicitante',
        'tipo_prestamo',
        'monto',
        'pago_total',
        'archivo_solicitud',
        'archivo_identificacion',
        'archivo_comprobante_domicilio',
        'status',
    ];
}
