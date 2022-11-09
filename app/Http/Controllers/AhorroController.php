<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ahorro;
use App\Models\DetalleAhorro;
use Carbon\Carbon;

class AhorroController extends Controller
{
    public function index() {
        $to_date = Carbon::createFromFormat('Y-m-d', '2022-12-31');
        $from_date = Carbon::now()->format('Y-m-d');
        $dias_restantes = $to_date->diffInDays($from_date);
        $semana_actual = $dias_restantes - ($dias_restantes/7);
        $semanas_restantes = 52-$semana_actual;

        // $solicitudes = Ahorro::select(
        $solicitudes = DB::table('solicitudes_ahorro')
        ->leftJoin('ahorrador', 'solicitudes_ahorro.gmin_solicitante', '=', 'ahorrador.gmin')
        ->select(
            'solicitudes_ahorro.id',
            'solicitudes_ahorro.folio',
            'solicitudes_ahorro.monto_semanal',
            'solicitudes_ahorro.gmin_solicitante',
            'solicitudes_ahorro.status',
            'ahorrador.nombres',
            'ahorrador.paterno',
        )->get();

        foreach ($solicitudes as $solicitud) {
            switch ($solicitud->status) {
                case 'AUTORIZADO':
                    $solicitud->color = '#4dc46d';
                    break;
                
                    case 'RECHAZADO':
                        $solicitud->color = '#c44d4d';
                        break;

                        case 'REVISADO':
                            $solicitud->color = '#c49a4d';
                            break;
                
                default:
                $solicitud->color = '#d4d4d4';
                    break;
            }
        }
        
        return view('ahorro.index', array('solicitudes' => $solicitudes, 'semana_actual' => round($semana_actual, 0)));
    }

    public function store(Request $request) {
        // dd($request);
        
        $ahorro = new Ahorro();
        
        if($request->folio) {
            $ahorro->folio = $request->folio;
        }
        $ahorro->monto_semanal = $request->monto_semanal;
        $ahorro->gmin_solicitante = $request->gmin_solicitante;
        $ahorro->status = 'SOLICITADO';

        $ahorro->save();

        return back()->with('success', 'La solicitud de ahorro fue creada exitosamente');
    }

    public function update(Request $request) {
        // dd($request);
        
        // $to_date = Carbon::createFromFormat('Y-m-d', '2022-12-31');
        // $from_date = Carbon::now()->format('Y-m-d');
        // $dias_restantes = $to_date->diffInDays($from_date);
        // $semana_actual = $dias_restantes - ($dias_restantes/7);
        // $semanas_restantes = 52-$semana_actual;

        // $semanas = [];

        

        $ultimoFolio = DetalleAhorro::select('id', 'folio')->orderBy('id', 'desc')->first();

        if(!$ultimoFolio) {
            $ultimoFolio = 0;
        }


        if($request->accion == 'Autorizar') {

            $solicitudExistente = DetalleAhorro::select(
                'folio',
                'gmin_solicitante'
                )
                ->where([
                    'folio' => $request->folio,
                    'gmin_solicitante' => $request->gmin
                ])
                ->first();
    
            if($solicitudExistente) {
                for ($index = $request->semana; $index <= 52 ; $index++) { 
                    DetalleAhorro::where([
                        'folio' => $request->folio,
                        'gmin_solicitante' => $request->gmin,
                        'semana' => $index,
                    ])->update([
                        'folio' => $request->folio,
                        'monto_semanal' => $request->monto_semanal,
                        'gmin_solicitante' => $request->gmin,
                    ]);
                }
            } else {
                for ($index = $request->semana; $index <= 52 ; $index++) { 
                    $detalle_ahorro = new DetalleAhorro();
    
                    $detalle_ahorro->folio = $request->folio;
                    // $detalle_ahorro->folio = $ultimoFolio->folio + 1;
                    $detalle_ahorro->monto_semanal = $request->monto_semanal;
                    $detalle_ahorro->semana = $index;
                    $detalle_ahorro->gmin_solicitante = $request->gmin;
    
                    $detalle_ahorro->save();
    
                    // array_push($semanas, $index);
                }   
            }
    



            // for ($index = $request->semana; $index <= 52 ; $index++) { 
            //     $detalle_ahorro = new DetalleAhorro();

            //     $detalle_ahorro->folio = $request->folio;
            //     // $detalle_ahorro->folio = $ultimoFolio->folio + 1;
            //     $detalle_ahorro->monto_semanal = $request->monto_semanal;
            //     $detalle_ahorro->semana = $index;
            //     $detalle_ahorro->gmin_solicitante = $request->gmin;

            //     $detalle_ahorro->save();

            //     // array_push($semanas, $index);
            // }

            // return response([
            //     'semana_actual' => $semana_actual,
            //     'data' => $semanas
            // ]);

            // return response([
            //     'actual' => number_format($semana_actual),
            //     'semanas_restantes' => round($semanas_restantes,0)
                
            // ]);
            Ahorro::where(['gmin_solicitante' => $request->gmin, 'folio' => $request->folio])->update(['status' => 'AUTORIZADO']);


            $detalle = new DetalleAhorro();


        }

        if($request->accion == 'Revisar') {
            Ahorro::where(['gmin_solicitante' => $request->gmin, 'folio' => $request->folio])->update(['status' => 'REVISADO']);
        }

        if($request->accion == 'Rechazar') {
            Ahorro::where(['gmin_solicitante' => $request->gmin, 'folio' => $request->folio])->update(['status' => 'RECHAZADO']);
        }

        return back()->with('success', 'La solicitud fue actualizada exitosamente');
    }
}
