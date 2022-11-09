@extends('layouts.app')

@section('css')

@endsection

@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between m-3">
                <h3>Perfil ahorrador</h3>
                <a href="{{ route('perfil-ahorrador.create') }}" class="btn btn-primary">
                    Crear perfil ahorrador
                </a>
                {{-- <button type="button" class="btn btn-primary">
                    Crear perfil ahorrador
                </button> --}}
            </div>
            
            <hr class="mx-3">
            <div class="m-4">
                <div class="row">
                    <div class="card col-md-12 p-4">
                        <div class="container-fluid">

                            <img src="{{ asset('storage/images/'.$perfil->foto) }}" alt="" height="250px" class="rounded">
                            {{-- <img src="{{ asset('assets/jona.jpg') }}" alt="" height="250px" class="rounded"> --}}
    
                            {{-- <form action="{{ route('perfil-ahorrador.update', $perfil->gmin) }}" method="POST"> --}}
                            <form action="{{ route('perfil-ahorrador.update') }}" method="POST">
                                @csrf

                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>GMIN</label>
                                            <input type="text" name="gmin" class="form-control" value="{{ $perfil->gmin }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Apellido paterno</label>
                                            <input type="text" name="paterno" class="form-control" value="{{ $perfil->paterno }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Apellido materno</label>
                                            <input type="text" name="materno" class="form-control" value="{{ $perfil->materno }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Nombres</label>
                                            <input type="text" name="nombres" class="form-control" value="{{ $perfil->nombres }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Fecha de nacimiento</label>
                                            <input type="text" name="fecha_nacimiento" class="form-control" value="{{ $perfil->fecha_nacimiento }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Ciudad de nacimiento</label>
                                            <input type="text" name="ciudad_nacimiento" class="form-control" value="{{ $perfil->ciudad_nacimiento }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Nacionalidad</label>
                                            <select name="nacionalidad" id="nacionalidad" class="form-select">
                                                @foreach ($paises as $pais)
                                                    <option value="{{ $pais->id }}" {{ ($pais->id == $perfil->nacionalidad) ? 'selected' : '' }} >{{ $pais->pais }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" name="nacionalidad" class="form-control" value="{{ $perfil->nacionalidad }}">
                                            <input type="text" name="nacionalidad" class="form-control" value="{{ $perfil->pais }}"> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Telefono particular</label>
                                            <input type="text" name="telefono_particular" class="form-control" value="{{ $perfil->telefono }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Correo personal</label>
                                            <input type="text" name="correo_personal" class="form-control" value="{{ $perfil->correo_personal }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>No. identificación</label>
                                            <input type="text" name="numero_identificacion" class="form-control" value="{{ $perfil->numero_identificacion }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Calle</label>
                                            <input type="text" name="calle" class="form-control" value="{{ $perfil->calle }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Colonia</label>
                                            <input type="text" name="colonia" class="form-control" value="{{ $perfil->colonia }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Ciudad</label>
                                            <input type="text" name="ciudad" class="form-control" value="{{ $perfil->ciudad }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>RFC</label>
                                            <input type="text" name="rfc" class="form-control" value="{{ $perfil->rfc }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>CURP</label>
                                            <input type="text" name="curp" class="form-control" value="{{ $perfil->curp }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Planta</label>
                                            {{-- Debe ser select - PTE hacer catalogo --}}
                                            <select name="planta" id="planta" class="form-select">
                                                @foreach ($plantas as $planta)
                                                    <option value="{{ $planta->id }}" {{ ($planta->planta == $perfil->planta) ? 'selected' : '' }} >{{ $planta->planta }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Departamento</label>
                                            <input type="text" name="departamento" class="form-control" value="{{ $perfil->departamento }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Puesto</label>
                                            <input type="text" name="puesto" class="form-control" value="{{ $perfil->puesto }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Telefono oficina</label>
                                            <input type="text" name="telefono_oficina" class="form-control" value="{{ $perfil->telefono_oficina }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Correo empresa</label>
                                            <input type="text" name="correo_empresa" class="form-control" value="{{ $perfil->correo_empresa }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Tipo empleado</label>
                                            <select name="tipo_empleado" id="tipo_empleado" class="form-select">
                                                @foreach ($categorias_empleado as $categoria)
                                                    <option value="{{ $categoria->id }}" {{ ($categoria->tipo_empleado == $perfil->tipo_empleado) ? 'selected' : '' }} >{{ $categoria->tipo_empleado }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" name="tipo_empleado" class="form-control" value="{{ $perfil->tipo_empleado }}"> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Fecha alta</label>
                                            <input type="text" name="fecha_alta" class="form-control" disabled value="{{ $perfil->created_at }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Fecha última actualización</label>
                                            <input type="text" name="fecha_ultima_actualizacion" class="form-control" disabled value="{{ $perfil->updated_at }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Status</label>
                                            <input type="text" name="status" class="form-control" value="{{ $perfil->status_empleado }}">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Contraseña</label>
                                            <input type="text" name="password" class="form-control" value="password">
                                        </div>
                                    </div>
        
                                </div>

                                <div class="row p-3">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            
                            </form>
    
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')


@endsection