<?php

namespace App\Models\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrestamo extends Model
{
    use HasFactory;
    protected $table = 'tipo_prestamo';
    protected $fillable = [
        'id',
        'tipo_prestamo',
        'tasa_interes',
        'unidad_maxima',
        'periocidad'
    ];
}
