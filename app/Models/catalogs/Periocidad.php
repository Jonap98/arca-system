<?php

namespace App\Models\catalogs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periocidad extends Model
{
    use HasFactory;
    protected $table = 'periocidad';
    protected $fillable = [
        'periodo',
        'dias'
    ];
}
