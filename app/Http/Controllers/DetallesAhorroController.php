<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleAhorro;
use App\Models\PerfilAhorrador;
use Carbon\Carbon;

class DetallesAhorroController extends Controller
{
    // A través de index, los empleados acceden a los detalles de su ahorro
    public function index(Request $request) {
        $solicitante = PerfilAhorrador::select(
            'gmin',
            'paterno',
            'materno',
            'nombres'
        )
        // ->where('gmin', Auth::user()->gmin)
        ->first();

        $ahorro = DetalleAhorro::select(
            'folio',
            'monto_semanal',
            'semana',
            'gmin_solicitante',
        )
        // ->where('gmin_solicitante', Auth::user()->gmin)
        ->where('gmin_solicitante', '987654321')
        ->get();

        return view('ahorro.detalles_ahorro.index');
    }


    // A través de detalles, los de Arca acceden a los detalles de un empleado
    public function detalles($gmin) {
        // dd($gmin);
        $to_date = Carbon::createFromFormat('Y-m-d', '2022-12-31');
        $from_date = Carbon::now()->format('Y-m-d');
        $dias_restantes = $to_date->diffInDays($from_date);
        $semana_actual = $dias_restantes - ($dias_restantes/7);
        $semanas_restantes = 52-$semana_actual;
        $semana_actual = round($semana_actual, 0);

        $solicitante = PerfilAhorrador::select(
            'gmin',
            'paterno',
            'materno',
            'nombres'
        )
        // ->where('gmin', Auth::user()->gmin)
        ->where('gmin', $gmin)
        ->first();

        $ahorro = DetalleAhorro::select(
            'folio',
            'monto_semanal',
            'semana',
            'gmin_solicitante',
        )
        // ->where('gmin_solicitante', Auth::user()->gmin)
        ->where('gmin_solicitante', $gmin)
        ->get();

        return view('ahorro.detalles_ahorro.index', array('ahorro' => $ahorro, 'solicitante' => $solicitante, 'semana_actual' => $semana_actual));
    }
}
