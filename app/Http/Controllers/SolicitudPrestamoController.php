<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catalogs\TipoPrestamo;
use App\Models\PerfilAhorrador;
use App\Models\Prestamo;
use App\Models\DetallePrestamo;
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

    public function autorizar(Request $request) {
        // Request:
        // - Plazo
        // - folio
        // - monto

        // dd($request);
        $ultimoFolio = DetallePrestamo::select('folio')->orderBy('id', 'desc')->first();
        // return response([
        //     'data' => $ultimoFolio
        // ]);
        
        // Si NO hay registros, se le asigna un 0 al folio
        if(!$ultimoFolio) {
            $folio = 0;
        } else {
            $folio = $ultimoFolio->folio;
        }

        for ($index = 0; $index <= $request->plazo - 1; $index++) { 
            $detalle_prestamo = new DetallePrestamo();
            
            $detalle_prestamo->folio = $folio + 1;
            $detalle_prestamo->abono = $request->abono;

            $detalle_prestamo->numero_de_pago = $index+1;

            $detalle_prestamo->status_pago = 'PENDIENTE';

            $detalle_prestamo->saldo_total = $request->pago_total;

            $detalle_prestamo->saldo_restante = $request->pago_total;
            $detalle_prestamo->gmin_solicitante = $request->gmin;
    
            $detalle_prestamo->save();
        }   
        
    
        Prestamo::where(['id' => $request->id_solicitud])->update(['status' => 'AUTORIZADO']);


        // $detalle = new Prestamo();

        return back()->with('success', 'El préstamo fue autorizado exitosamente');
    }
}
