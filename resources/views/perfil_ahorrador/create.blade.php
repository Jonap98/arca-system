@extends('layouts.app')

@section('css')

@endsection

@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between m-3">
                <h3>Crear perfil ahorrador</h3>
            </div>
            <hr class="mx-3">
            <div class="m-4">
                <div class="row">
                    {{-- @if(session('error'))
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors)
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ $errors }}
                        </div>
                    @endif --}}

                    @if ($errors)
                        @foreach ($errors->all() as $errors)
                            <div class="alert alert-danger mt-2" role="alert">
                                <li>{{ $errors }}</li>
                                {{-- {{ session('error') }} --}}
                            </div>
                        @endforeach
                    @endif
                    <div class="card col-md-12 p-4">
                        <div class="container-fluid">
                            {{-- <img src="{{ asset('assets/jona.jpg') }}" alt="" height="250px" class="rounded"> --}}
                            <form method="POST" action="{{ route('perfil-ahorrador.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Foto</label>
                                            <input type="file" name="imagen" class="form-control">
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>GMIN</label>
                                            <input type="text" name="gmin" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Apellido paterno</label>
                                            <input type="text" name="paterno" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Apellido materno</label>
                                            <input type="text" name="materno" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Nombres</label>
                                            <input type="text" name="nombres" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Ciudad de nacimiento</label>
                                            <input type="text" name="ciudad_nacimiento" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Nacionalidad</label>
                                            <select name="nacionalidad" id="nacionalidad" class="form-select">
                                                @foreach ($paises as $pais)
                                                    <option value="{{ $pais->id }}">{{ $pais->pais }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Telefono particular</label>
                                            <input type="text" name="telefono_particular" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Correo personal</label>
                                            <input type="text" name="correo_personal" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>No. identificación</label>
                                            <input type="text" name="numero_identificacion" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Calle</label>
                                            <input type="text" name="calle" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Colonia</label>
                                            <input type="text" name="colonia" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Ciudad</label>
                                            <input type="text" name="ciudad" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>RFC</label>
                                            <input type="text" name="rfc" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>CURP</label>
                                            <input type="text" name="curp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Planta</label>
                                            <select name="planta" id="planta" class="form-select">
                                                @foreach ($plantas as $planta)
                                                    <option value="{{ $planta->id }}">{{ $planta->planta }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Departamento</label>
                                            <input type="text" name="departamento" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Puesto</label>
                                            <input type="text" name="puesto" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Telefono oficina</label>
                                            <input type="text" name="telefono_oficina" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Correo empresa</label>
                                            <input type="text" name="correo_empresa" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Tipo empleado</label>
                                            <select name="tipo_empleado" id="tipo-empleado" class="form-select">
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}">{{ $categoria->tipo_empleado }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Fecha alta</label>
                                            <input type="text" name="fecha_alta" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Fecha última actualización</label>
                                            <input type="text" name="fecha_ultima_actualizacion" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Status</label>
                                            <input type="text" name="status" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
        
                                <div class="row">
        
                                    <div class="col-md-6">
                                        <div class="m-2">
                                            <label>Contraseña</label>
                                            <input type="text" name="contraseña" class="form-control">
                                        </div>
                                    </div>
        
                                </div>
    
                                <div class="row p-3">
                                    <button class="btn btn-primary" type="submit">Crear</button>
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