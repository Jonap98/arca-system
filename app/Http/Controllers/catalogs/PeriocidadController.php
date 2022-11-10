<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catalogs\Periocidad;

class PeriocidadController extends Controller
{
    public function index() {
        $periodos = Periocidad::select(
            'id',
            'periodo',
            'dias',
        )->get();

        return view('catalogs.periocidad.index', array('periodos' => $periodos));
    }

    public function store(Request $request) {

        $periodo = new Periocidad();

        $periodo->periodo = $request->nombre;
        $periodo->dias = $request->dias;

        $periodo->save();
        
        return back()->with('success', 'El periodo fue registrado con exitosamente');
    }
}
