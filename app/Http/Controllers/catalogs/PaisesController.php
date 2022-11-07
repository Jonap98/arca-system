<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaisesController extends Controller
{
    public function index() {
        return view('catalogs.paises.index');
    }
}
