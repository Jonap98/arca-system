<?php

namespace App\Models\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriasEmpleado extends Model
{
    use HasFactory;
    protected $table = 'categorias_empleado';
    protected $fillable = [
        'tipo_empleado'
    ];
}
