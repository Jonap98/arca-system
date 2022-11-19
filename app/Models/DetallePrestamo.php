<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePrestamo extends Model
{
    use HasFactory;
    protected $table = 'detalle_prestamo';
    protected $fillable = [
        'id',
        'folio',
        'abono',
        'numero_de_pago',
        'status_pago',
        'saldo_total',
        'saldo_restante',
        'gmin_solicitante',
    ];
}
