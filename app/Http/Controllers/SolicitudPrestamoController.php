<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catalogs\TipoPrestamo;
use App\Models\PerfilAhorrador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SolicitudPrestamoController extends Controller
{
    public function index() {
        $ahorrador = PerfilAhorrador::select(
            'gmin',
            'paterno',
            'materno',
            'nombres',
            'planta',
            'departamento',
            'puesto',
            'telefono',
            'telefono_oficina',
        )
        ->where('gmin', Auth::user()->gmin)
        ->first();

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

        $fecha_solicitud = Carbon::now();

        return view('prestamo.solicitud.index', array('tipos_de_prestamo' => $tipos_de_prestamo, 'fecha_solicitud' => $fecha_solicitud, 'ahorrador' => $ahorrador));
    }
}
