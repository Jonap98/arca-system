<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Prestamo;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    //

    public function index() {
        $to_date = Carbon::createFromFormat('Y-m-d', '2022-12-31');
        $from_date = Carbon::now()->format('Y-m-d');
        $dias_restantes = $to_date->diffInDays($from_date);
        $semana_actual = $dias_restantes - ($dias_restantes/7);
        $semanas_restantes = 52-$semana_actual;

        // return response([
        //     'data' => $semana_actual
        // ]);

        $solicitudes = [];

        if(Auth::user()->rol == 'ARCA') {
            $solicitudes = DB::table('solicitudes_prestamo')
            ->leftJoin('ahorrador', 'solicitudes_prestamo.gmin_solicitante', '=', 'ahorrador.gmin')
            ->leftJoin('tipo_prestamo', 'solicitudes_prestamo.tipo_prestamo', '=', 'tipo_prestamo.id')
            ->select(
                'solicitudes_prestamo.id',
                'solicitudes_prestamo.gmin_solicitante',
                'solicitudes_prestamo.tipo_prestamo',
                'solicitudes_prestamo.monto',
                'solicitudes_prestamo.pago_total',
                'solicitudes_prestamo.status',
                'solicitudes_prestamo.archivo_solicitud',
                'solicitudes_prestamo.archivo_identificacion',
                'solicitudes_prestamo.archivo_comprobante_domicilio',
                'ahorrador.nombres',
                'ahorrador.paterno',
                'tipo_prestamo.tipo_prestamo',
                'tipo_prestamo.tasa_interes',
                'tipo_prestamo.unidad_maxima_pago',
            )->get();
        }
        if(Auth::user()->rol == 'EMPLEADO') {
            $solicitudes = DB::table('solicitudes_prestamo')
            ->leftJoin('ahorrador', 'solicitudes_prestamo.gmin_solicitante', '=', 'ahorrador.gmin')
            ->leftJoin('tipo_prestamo', 'solicitudes_prestamo.tipo_prestamo', '=', 'tipo_prestamo.id')
            ->select(
                'solicitudes_prestamo.id',
                'solicitudes_prestamo.gmin_solicitante',
                'solicitudes_prestamo.tipo_prestamo',
                'solicitudes_prestamo.monto',
                'solicitudes_prestamo.pago_total',
                'solicitudes_prestamo.status',
                'solicitudes_prestamo.archivo_solicitud',
                'solicitudes_prestamo.archivo_identificacion',
                'solicitudes_prestamo.archivo_comprobante_domicilio',
                'ahorrador.nombres',
                'ahorrador.paterno',
                'tipo_prestamo.tipo_prestamo',
                'tipo_prestamo.tasa_interes',
                'tipo_prestamo.unidad_maxima_pago',
            )
            ->where('solicitudes_prestamo.gmin_solicitante', Auth::user()->gmin)
            ->get();
        }

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

        return view('prestamo.index', array('solicitudes' => $solicitudes, 'semana_actual' => round($semana_actual, 0)));
    }

    public function update(Request $request) {
        $ultimoFolio = Prestamo::select('id')->orderBy('id', 'desc')->first();
        
        // Si NO hay registros, se le asigna un 0 al folio
        if(!$ultimoFolio) {
            $ultimoFolio = 0;
        }

        if($request->accion == 'Autorizar') {
            $solicitudExistente = Prestamo::select(
                'id',
                'gmin_solicitante'
                )
                ->where([
                    'id' => $request->id,
                    'gmin_solicitante' => $request->gmin
                ])
                ->orderBy('id', 'desc')
                ->first();

            // Si existe una solicitud, osea, si se quiere modificar el monto
            if($solicitudExistente) {
                for ($index = $request->semana; $index <= 52 ; $index++) { 
                    Prestamo::where([
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
                    $detalle_ahorro = new Prestamo();
    
                    $detalle_ahorro->folio = $ultimoFolio + 1;
                    $detalle_ahorro->monto_semanal = $request->monto_semanal;
                    $detalle_ahorro->semana = $index;
                    $detalle_ahorro->gmin_solicitante = $request->gmin;
    
                    $detalle_ahorro->save();    
                }   
            }
    
            Ahorro::where(['gmin_solicitante' => $request->gmin, 'folio' => $request->folio])->update(['status' => 'AUTORIZADO']);


            $detalle = new Prestamo();


        }

        if($request->accion == 'Revisar') {
            Ahorro::where(['gmin_solicitante' => $request->gmin, 'folio' => $request->folio])->update(['status' => 'REVISADO']);
        }

        if($request->accion == 'Rechazar') {
            Ahorro::where(['gmin_solicitante' => $request->gmin, 'folio' => $request->folio])->update(['status' => 'RECHAZADO']);
        }

        return back()->with('success', 'La solicitud fue actualizada exitosamente');

    }

    public function download(Request $request) {
        // dd($request);

        $documents = Prestamo::where('id', $request->id)->first();

        // return response([
        //     'data' => $documents
        // ]);

        // $file= public_path(). "/download/info.pdf";
        // $file= public_path(). $documents->archivo_solicitud;
        $file = $documents->archivo_solicitud;

        // return response([
        //     'data' => $documents->archivo_solicitud,
        //     'file' => $file
        // ]);

        $headers = array(
                'Content-Type: application/pdf',
                );

        return response()->download(($file), $headers);

        // return Response::download($file, 'filename.pdf', $headers);

    }
}
