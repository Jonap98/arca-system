<?php

namespace App\Http\Controllers\catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catalogs\Periocidad;
use App\Models\catalogs\TipoPrestamo;
use Illuminate\Support\Facades\DB;

class TipoPrestamoController extends Controller
{
    public function index() {
        $periodos = Periocidad::select(
            'id',
            'periodo',
            'dias'
        )
        ->get();

        // $tipos_de_prestamo = TipoPrestamo::select(
        $tipos_de_prestamo = DB::table('tipo_prestamo')
        ->leftJoin('periocidad', 'tipo_prestamo.periocidad', '=', 'periocidad.id')
        ->select(
            'tipo_prestamo.id',
            'tipo_prestamo.tipo_prestamo',
            'tipo_prestamo.tasa_interes',
            'tipo_prestamo.unidad_maxima_pago',
            'tipo_prestamo.periocidad',
            'periocidad.periodo',
        )->get();

        // return response([
        //     'data' => $tipos_de_prestamo
        // ]);

        return view('catalogs.tipo_prestamo.index', array('periodos' => $periodos, 'tipos_de_prestamo' => $tipos_de_prestamo));
    }

    public function store(Request $request) {
        $tipo_prestamo = new TipoPrestamo();

        $tipo_prestamo->tipo_prestamo = $request->tipo_prestamo;
        $tipo_prestamo->tasa_interes = $request->tasa_interes;
        $tipo_prestamo->unidad_maxima_pago = $request->unidad_maxima;
        $tipo_prestamo->periocidad = $request->periocidad;

        $tipo_prestamo->save();

        return back()->with('success', 'El tipo de préstamo fue registrado exitosamente');
    }
}
