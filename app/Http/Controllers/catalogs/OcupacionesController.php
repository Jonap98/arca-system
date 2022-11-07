<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OcupacionesController extends Controller
{
    public function index() {
        return view('catalogs.ocupaciones.index');
    }
}
