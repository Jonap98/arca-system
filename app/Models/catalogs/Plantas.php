<?php

namespace App\Models\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantas extends Model
{
    use HasFactory;
    protected $table = 'plantas';
    protected $fillable = [
        'planta'
    ];
}
