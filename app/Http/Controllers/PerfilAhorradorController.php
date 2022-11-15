<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerfilAhorrador;
use App\Models\catalogs\Paises;
use App\Models\catalogs\CategoriasEmpleado;
use App\Models\catalogs\Plantas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PerfilAhorradorController extends Controller
{
    public function index() {
        $perfiles = PerfilAhorrador::select(
            'gmin',
            'paterno',
            'materno',
            'nombres',
        )->get();

        // return response([
        //     'data' => $perfiles
        // ]);

        return view('perfil_ahorrador.index', array('perfiles' => $perfiles));
    }

    public function details($gmin) {
        // $perfil = PerfilAhorrador::leftJoin('paises', 'pais.id', '=', )
        $perfil = DB::table('ahorrador')
        ->leftJoin('paises', 'ahorrador.nacionalidad', '=', 'paises.id')
        ->leftJoin('categorias_empleado', 'ahorrador.tipo_empleado', '=', 'categorias_empleado.id')
        ->leftJoin('plantas', 'plantas.id', '=', 'ahorrador.planta')
        ->select(
            'ahorrador.gmin',
            'ahorrador.paterno',
            'ahorrador.materno',
            'ahorrador.nombres',
            'ahorrador.fecha_nacimiento',
            'ahorrador.ciudad_nacimiento',
            'ahorrador.nacionalidad',
            'ahorrador.telefono',
            'ahorrador.correo_personal',
            'ahorrador.numero_identificacion',
            'ahorrador.calle',
            'ahorrador.colonia',
            'ahorrador.ciudad',
            'ahorrador.rfc',
            'ahorrador.curp',
            'ahorrador.planta',
            'ahorrador.departamento',
            'ahorrador.puesto',
            'ahorrador.telefono_oficina',
            'ahorrador.correo_empresa',
            'ahorrador.tipo_empleado',
            'ahorrador.foto',
            'ahorrador.status_empleado',
            'ahorrador.created_at',
            'ahorrador.updated_at',
            'paises.pais',
            'categorias_empleado.tipo_empleado',
            'plantas.planta'
        )
        ->where('ahorrador.gmin', $gmin)
        ->first();

        // return response([
        //     'data' => $perfil->foto
        // ]);

        $paises = Paises::select('id', 'pais')->get();
        $categorias_empleado = CategoriasEmpleado::select('id', 'tipo_empleado')->get();
        $plantas = Plantas::select('id', 'planta')->get();

        return view('perfil_ahorrador.details', array('perfil' => $perfil, 'paises' => $paises, 'categorias_empleado' => $categorias_empleado, 'plantas' => $plantas));
    }

    public function create() {
        $paises = Paises::select('id', 'pais')->get();
        $categorias = CategoriasEmpleado::select('id', 'tipo_empleado')->get();
        $plantas = Plantas::select('id', 'planta')->get();

        return view('perfil_ahorrador.create', array('paises' => $paises, 'categorias' => $categorias, 'plantas' => $plantas));
    }

    public function store(Request $request) {
        // dd($request);
        // dd($request->file('imagen'));
        // dd($request->file('imagen')->store('public/images'));

        Validator::make($request->all(), [
            'gmin' => 'unique:ahorrador',
            'paterno' => 'required|max:100',
            'materno' => 'required|max:100',
            'nombres' => 'required|max:255',
            'fecha_nacimiento' => 'required|max:255',
            'ciudad_nacimiento' => 'required|max:255',
            'nacionalidad' => 'required',
            // 'telefono_particular' => 'required|numeric|max:10',
            'correo_personal' => 'email',
            'numero_identificacion' => 'required|max:18',
            'calle' => 'required|max:255',
            'colonia' => 'required|max:255',
            'ciudad' => 'required|max:255',
            'rfc' => 'required|max:13',
            'curp' => 'required|max:18',
            'planta' => 'required',
            'departamento' => 'required|max:100',
            'puesto' => 'required|max:100',
            // 'telefono_oficina' => 'required|numeric|max:10',
            'correo_empresa' => 'email',
            'tipo_empleado' => 'required',
        ])->validate();

        $ahorrador = new PerfilAhorrador();

        $ahorrador->gmin = $request->gmin;
        $ahorrador->paterno = $request->paterno;
        $ahorrador->materno = $request->materno;
        $ahorrador->nombres = $request->nombres;
        $ahorrador->fecha_nacimiento = $request->fecha_nacimiento;
        $ahorrador->ciudad_nacimiento = $request->ciudad_nacimiento;
        $ahorrador->nacionalidad = $request->nacionalidad;
        $ahorrador->telefono = $request->telefono_particular;
        $ahorrador->correo_personal = $request->correo_personal;
        $ahorrador->numero_identificacion = $request->numero_identificacion;
        $ahorrador->calle = $request->calle;
        $ahorrador->colonia = $request->colonia;
        $ahorrador->ciudad = $request->ciudad;
        $ahorrador->rfc = $request->rfc;
        $ahorrador->curp = $request->curp;
        $ahorrador->planta = $request->planta;
        $ahorrador->departamento = $request->departamento;
        $ahorrador->puesto = $request->puesto;
        $ahorrador->telefono_oficina = $request->telefono_oficina;
        $ahorrador->correo_empresa = $request->correo_empresa;
        $ahorrador->tipo_empleado = $request->tipo_empleado;

        if($request->hasFile('imagen')) {
            $ahorrador->foto = $request->file('imagen')->store('public/images');
        }
        
        $ahorrador->status_empleado = $request->status;


        // if($request->imagen) {
        //     $ahorrador->foto = $request->imagen->store('public/images');
        // }
    
        // $request->validate([
        //     // 'gmin' => 'unique:ahorrador',
        //     'imagen' => 'image|max:102400'
        // ]);

        // if($request->hasFile('image')) {
        //     $path = $request->file('images')->store('images');
        //     // $path = Storage::disk('images')->put( 'imagen.jpg', file_get_contents($request->file('images')->getPathName()) );


        //     PerfilAhorrador::create([
        //         'gmin' => $ahorrador->gmin,
        //         'paterno' => $ahorrador->paterno,
        //         'materno' => $ahorrador->materno,
        //         'nombres' => $ahorrador->nombres,
        //         'fecha_nacimiento' => $ahorrador->fecha_nacimiento,
        //         'ciudad_nacimiento' => $ahorrador->ciudad_nacimiento,
        //         'nacionalidad' => $ahorrador->nacionalidad,
        //         'telefono' => $ahorrador->telefono,
        //         'correo_personal' => $ahorrador->correo_personal,
        //         'numero_identificacion' => $ahorrador->numero_identificacion,
        //         'calle' => $ahorrador->calle,
        //         'colonia' => $ahorrador->colonia,
        //         'ciudad' => $ahorrador->ciudad,
        //         'rfc' => $ahorrador->rfc,
        //         'curp' => $ahorrador->curp,
        //         'planta' => $ahorrador->planta,
        //         'departamento' => $ahorrador->departamento,
        //         'puesto' => $ahorrador->puesto,
        //         'telefono_oficina' => $ahorrador->telefono_oficina,
        //         'correo_empresa' => $ahorrador->correo_empresa,
        //         'tipo_empleado' => $ahorrador->tipo_empleado,
        //         'foto' => $path,
        //     ]);
        // }

        $ahorrador->save();

        return redirect()->route('perfil-ahorrador')->with('success', 'El perfil ahorrador fue creado exitosamente');
        // return view('perfil_ahorrador.index')->with('success', 'El perfil ahorrador fue creado exitosamente');
        
    }

    public function update(Request $request) {
        // dd($request);
        // return response([
        //     'data' => $request->gmin
        // ]);
        $ahorrador = PerfilAhorrador::where('gmin', $request->gmin)->update([
            'gmin' => $request->gmin,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'nombres' => $request->nombres,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'ciudad_nacimiento' => $request->ciudad_nacimiento,
            'nacionalidad' => $request->nacionalidad,
            'telefono' => $request->telefono_particular,
            'correo_personal' => $request->correo_personal,
            'numero_identificacion' => $request->numero_identificacion,
            'calle' => $request->calle,
            'colonia' => $request->colonia,
            'ciudad' => $request->ciudad,
            'rfc' => $request->rfc,
            'curp' => $request->curp,
            'planta' => $request->planta,
            'departamento' => $request->departamento,
            'puesto' => $request->puesto,
            'telefono_oficina' => $request->telefono_oficina,
            'correo_empresa' => $request->correo_empresa,
            'tipo_empleado' => $request->tipo_empleado,
            'status_empleado' => $request->status,
        ]);

        return redirect()->route('perfil-ahorrador')->with('success', 'El perfil ahorrador fue actualizado exitosamente');
    }

    public function delete(Request $request) {
        // dd($request);
        PerfilAhorrador::where('gmin', $request->gmin)->delete();
        // PerfilAhorrador::destroy($gmin);
        return redirect()->route('perfil-ahorrador')->with('success', 'El perfil ahorrador fue eliminado exitosamente');
    }
}
