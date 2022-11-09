<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catalogs\Paises;

class PaisesController extends Controller
{
    public function index() {
        $paises = Paises::select('id', 'pais')->get();

        return view('catalogs.paises.index', array('paises' => $paises));
    }

    public function store(Request $request) {
        $pais = new Paises();

        $pais->pais = $request->nombre;

        $pais->save();

        return back()->with('success', 'El país fue creado exitosamente');
    }
}
