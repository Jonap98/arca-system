<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catalogs\TipoPrestamo;
use App\Models\PerfilAhorrador;
use App\Models\Prestamo;
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

    public function store(Request $request) {
        // dd($request);
        // dd($request->file('solicitud_firmada'));
        

        $prestamo = new Prestamo();

        $prestamo->gmin_solicitante = Auth::user()->gmin;
        $prestamo->tipo_prestamo = $request->tipo_de_prestamo;
        $prestamo->monto = $request->monto;
        $prestamo->pago_total = $request->pago_total;

        if($request->hasFile('solicitud_firmada')) {
            $prestamo->archivo_solicitud = $request->file('solicitud_firmada')->store('public/pdf');
        }
        if($request->hasFile('solicitud_firmada')) {
            $prestamo->archivo_identificacion = $request->file('identificacion')->store('public/pdf');
        }
        if($request->hasFile('solicitud_firmada')) {
            $prestamo->archivo_comprobante_domicilio = $request->file('comprobante_domicilio')->store('public/pdf');
        }
        
        $prestamo->status = 'SOLICITADO';

        $prestamo->save();

        return back()->with('success', 'Solicitud de prestamo creada exitosamente');




        // dd($request->file('solicitud_firmada'));
        // dd($request);
        // if($request->hasFile('solicitud_firmada')) {
        //     $file = $request->file('solicitud_firmada');
            
        //     $filename = 'pdf_'.time().'.'.$file->guessExtension();

        //     $path = public_path('pdf/'.$nombre);

        //     if()
        // }
        // if($request-)
    }
}
