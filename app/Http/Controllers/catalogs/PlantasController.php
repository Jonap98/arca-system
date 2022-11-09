<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catalogs\Plantas;

class PlantasController extends Controller
{
    public function index() {
        $paises = Plantas::select('id', 'planta')->get();

        return view('catalogs.plantas.index', array('plantas' => $paises));
    }

    public function store(Request $request) {
        $planta = new Plantas();

        $planta->planta = $request->nombre;

        $planta->save();

        return back()->with('success', 'La planta fue creada exitosamente');
    }
}
