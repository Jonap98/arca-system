<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriasEmpleadoController extends Controller
{
    public function index() {
        return view('catalogs.categorias_empleado.index');
    }
}
