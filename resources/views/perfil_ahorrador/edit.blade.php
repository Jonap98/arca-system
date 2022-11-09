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
                    <div class="card col-md-12 p-4">
                        <div class="container-fluid">

                            <img src="{{ asset('assets/jona.jpg') }}" alt="" height="250px" class="rounded">
    
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
                                        <input type="text" name="fecha-nacimiento" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="m-2">
                                        <label>Ciudad de nacimiento</label>
                                        <input type="text" name="ciudad-nacimiento" class="form-control">
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="row">
    
                                <div class="col-md-6">
                                    <div class="m-2">
                                        <label>Nacionalidad</label>
                                        <input type="text" name="nacionalidad" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="m-2">
                                        <label>Telefono particular</label>
                                        <input type="text" name="telefono-particular" class="form-control">
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="row">
    
                                <div class="col-md-6">
                                    <div class="m-2">
                                        <label>Correo personal</label>
                                        <input type="text" name="correo-personal" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="m-2">
                                        <label>No. identificación</label>
                                        <input type="text" name="no-identificacion" class="form-control">
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
                                        {{-- Debe ser select - PTE hacer catalogo --}}
                                        <input type="text" name="planta" class="form-control">
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
                                        <input type="text" name="telefono-oficina" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="m-2">
                                        <label>Correo empresa</label>
                                        <input type="text" name="correo-empresa" class="form-control">
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="row">
    
                                <div class="col-md-6">
                                    <div class="m-2">
                                        <label>Tipo empleado</label>
                                        <input type="text" name="tipo-empleado" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="m-2">
                                        <label>Fecha alta</label>
                                        <input type="text" name="fecha-alta" class="form-control">
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="row">
    
                                <div class="col-md-6">
                                    <div class="m-2">
                                        <label>Fecha última actualización</label>
                                        <input type="text" name="fecha-ultima-actualizacion" class="form-control">
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
                                <button class="btn btn-primary">Guardar</button>
                            </div>
    
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