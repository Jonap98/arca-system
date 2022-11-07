<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoPrestamoController extends Controller
{
    public function index() {
        return view('catalogs.tipo_prestamo.index');
    }
}
