<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

        $solicitudes = [];

        if(Auth::user()->rol == 'ARCA') {
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
        }
        if(Auth::user()->rol == 'EMPLEADO') {
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
            )
            ->where('solicitudes_ahorro.gmin_solicitante', Auth::user()->gmin)
            ->get();

            // return response([
            //     'gmin' => Auth::user()->gmin,
            //     'solicitudes' => $solicitudes
            // ]);
        }

        // return response([
        //     'data' => $solicitudes
        // ]);

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

    // Crear solicitud de ahorro
    public function store(Request $request) {
        // dd($request);
        
        $ahorro = new Ahorro();
        
        // if($request->folio) {
        //     $ahorro->folio = $request->folio;
        // }
        $ahorro->monto_semanal = $request->monto_semanal;
        // $ahorro->gmin_solicitante = $request->gmin_solicitante;
        $ahorro->gmin_solicitante = Auth::user()->gmin;
        $ahorro->status = 'SOLICITADO';

        $ahorro->save();

        return back()->with('success', 'La solicitud de ahorro fue creada exitosamente');
    }

    // Autorizar, revisar y rechazar solicitud de ahorro
    public function update(Request $request) {

        $ultimoFolio = DetalleAhorro::select('id', 'folio')->orderBy('id', 'desc')->first();
        
        // Si NO hay registros, se le asigna un 0 al folio
        if(!$ultimoFolio) {
            $ultimoFolio = 0;
        }

        if($request->accion == 'Autorizar') {

            // dd($request);
            $solicitudExistente = DetalleAhorro::select(
                'folio',
                'gmin_solicitante'
                )
                ->where([
                    // 'id' => $request->id
                    'folio' => $request->folio,
                    'gmin_solicitante' => $request->gmin
                ])
                ->orderBy('id', 'desc')
                ->first();
            
                // return response([
                //     'data' => $solicitudExistente
                // ]);

            // Si existe una solicitud, osea, si se quiere modificar el monto
            if($solicitudExistente) {
                // dd($request);
                // return response([
                //     'msg' => 'Modificacion',
                //     'data' => $solicitudExistente
                // ]);
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
                // return response([
                //     'msg' => 'Nueva',
                // ]);
                for ($index = $request->semana; $index <= 52 ; $index++) { 
                    $detalle_ahorro = new DetalleAhorro();
    
                    $detalle_ahorro->folio = $ultimoFolio + 1;
                    $detalle_ahorro->monto_semanal = $request->monto_semanal;
                    $detalle_ahorro->semana = $index;
                    $detalle_ahorro->gmin_solicitante = $request->gmin;
    
                    $detalle_ahorro->save();    
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

    public function modify(Request $request) {
        $ahorro = new Ahorro();

        $ahorro->folio = $request->folio;
        $ahorro->monto_semanal = $request->monto_semanal;
        $ahorro->gmin_solicitante = Auth::user()->gmin;
        $ahorro->status = 'SOLICITADO';

        $ahorro->save();

        return back()->with('success', 'La solicitud de ahorro fue creada exitosamente');
    }

}
