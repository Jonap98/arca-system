<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstatusEmpresaController extends Controller
{
    public function index() {
        return view('catalogs.estatus_empresa.index');
    }
}
