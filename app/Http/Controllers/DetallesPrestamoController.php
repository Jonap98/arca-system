<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePrestamo;

class DetallesPrestamoController extends Controller
{
    public function index() {
        // $prestamo = DetallePrestamo::where
        return view('prestamo.detalles_prestamo.index');
    }
}
