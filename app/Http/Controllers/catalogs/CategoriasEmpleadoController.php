<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catalogs\CategoriasEmpleado;

class CategoriasEmpleadoController extends Controller
{
    public function index() {
        $categorias = CategoriasEmpleado::select('id', 'tipo_empleado')->get();
        
        return view('catalogs.categorias_empleado.index', array('categorias' => $categorias));
    }

    public function store(Request $request) {
        $tipo_empleado = new CategoriasEmpleado();

        $tipo_empleado->tipo_empleado = $request->nombre;

        $tipo_empleado->save();

        return back()->with('success', 'La categoría de empleado fue creada exitosamente');
    }
}
