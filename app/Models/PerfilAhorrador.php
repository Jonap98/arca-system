<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilAhorrador extends Model
{
    use HasFactory;
    protected $table = 'ahorrador';
    protected $fillable = [
        'gmin',
        'paterno',
        'materno',
        'nombres',
        'fecha_nacimiento',
        'ciudad_nacimiento',
        'nacionalidad',
        'telefono',
        'correo_personal',
        'numero_identificacion',
        'calle',
        'colonia',
        'ciudad',
        'rfc',
        'curp',
        'planta',
        'departamento',
        'puesto',
        'telefono_oficina',
        'correo_empresa',
        'tipo_empleado',
        'foto',
        'status_empleado',
        'created_at',
        'updated_at'
    ];
}
