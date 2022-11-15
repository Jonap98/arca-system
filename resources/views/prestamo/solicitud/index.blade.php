@extends('layouts.app')

@section('css')

@endsection

@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between m-3">
                <h3>Solicitud de préstamo</h3>
                {{-- <a href="#" class="btn btn-primary">
                    Crear perfil ahorrador
                </a> --}}
                {{-- <button type="button" class="btn btn-primary">
                    Crear perfil ahorrador
                </button> --}}
            </div>
            
            <hr class="mx-3">
            <div class="m-4">
                <form action="{{ route('solicitud-prestamo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="card col-md-12 p-2">
                            <div class="container-fluid">
    
                                {{-- <form action="#" method="POST">
                                    @csrf --}}
    
                                    <div class="row">
                                        <span>Tu infromación</span>
                                        <div class="col-md-3">
                                            <div class="m-2">
                                                <label>GMIN</label>
                                                <input type="text" disabled name="gmin" class="form-control" value="{{ $ahorrador->gmin }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="m-2">
                                                <label>Apellido paterno</label>
                                                <input type="text" disabled name="paterno" class="form-control" value="{{ $ahorrador->paterno }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="m-2">
                                                <label>Apellido materno</label>
                                                <input type="text" disabled name="materno" class="form-control" value="{{ $ahorrador->materno }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="m-2">
                                                <label>Nombres</label>
                                                <input type="text" disabled name="nombres" class="form-control" value="{{ $ahorrador->nombres }}">
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row">
            
                                        <div class="col-md-2">
                                            <div class="m-2">
                                                <label>Planta</label>
                                                <input type="text" disabled name="planta" class="form-control" value="{{ $ahorrador->planta }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="m-2">
                                                <label>Departamento</label>
                                                <input type="text" disabled name="departamento" class="form-control" value="{{ $ahorrador->departamento }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="m-2">
                                                <label>Puesto</label>
                                                <input type="text" disabled name="puesto" class="form-control" value="{{ $ahorrador->puesto }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="m-2">
                                                <label>Telefono oficina</label>
                                                <input type="text" disabled name="telefono_oficina" class="form-control" value="{{ $ahorrador->telefono_oficina }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="m-2">
                                                <label>Telefono particular</label>
                                                <input type="text" disabled name="telefono_particular" class="form-control" value="{{ $ahorrador->telefono }}">
                                            </div>
                                        </div>
    
            
                                    </div>
            
    
                                    {{-- <div class="row p-3">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div> --}}
                                
                                {{-- </form> --}}
        
                            </div>
    
                        </div>
    
                        <div class="card col-md-12 mt-2 p-4">
                            <div class="row">
                                <span>Datos para la solicitud</span>
                                <div class="col-md-2">
                                    <div class="m-2">
                                        <label>Tipo de prestamo</label>
                                        <select name="tipo_de_prestamo" id="tipo_de_prestamo" class="form-select" onchange="selectTipoPrestamo(value)">
                                            @foreach ($tipos_de_prestamo as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->tipo_prestamo }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <button onclick="selectTipoPrestamo('{{ $tipo->tipo_prestamo }}')" >click</button> --}}
                                    </div>
                                </div>
{{--     
                                <div class="col-md-2">
                                    <div class="m-2">
                                        <label>Fecha de solicitud</label>
                                        <input type="text" disabled name="fecha_solicitud" value="{{ $fecha_solicitud }}" class="form-control">
                                    </div>
                                </div> --}}
    
                                <div class="col-md-2">
                                    <div class="m-2">
                                        <label>Monto</label>
                                        <input type="number" name="monto" class="form-control" onkeyup="calcularTotal(value)">
                                    </div>
                                </div>
    
                                <div class="col-md-2">
                                    <div class="m-2">
                                        <label>Plazo</label>
                                        <input type="number" disabled id="plazo" name="plazo" class="form-control">
                                    </div>
                                </div>
    
                                <div class="col-md-2">
                                    <div class="m-2">
                                        <label>Tasa de interés</label>
                                        <input type="number" disabled id="tasa_interes" name="tasa_interes" class="form-control">
                                    </div>
                                </div>
    
                                <div class="col-md-2">
                                    <div class="m-2">
                                        <label>Total a pagar</label>
                                        <input type="number" id="pago_total" name="pago_total" class="form-control">
                                        <input type="hidden" id="pago_total_send" name="pago_total_send">
                                    </div>
                                </div>
    
                            </div>
    
                            <div class="row">
    
                                <div class="col-md-3">
                                    <div class="m-2">
                                        <label>Solicitud firmada</label>
                                        <input type="file" id="solicitud_firmada" name="solicitud_firmada" class="form-control">
                                    </div>
                                </div>
    
                                <div class="col-md-3">
                                    <div class="m-2">
                                        <label>Identificación</label>
                                        <input type="file" id="identificacion" name="identificacion" class="form-control">
                                    </div>
                                </div>
    
                                <div class="col-md-3">
                                    <div class="m-2">
                                        <label>Comprobante de domicilio</label>
                                        <input type="file" id="comprobante_domicilio" name="comprobante_domicilio" class="form-control">
                                    </div>
                                </div>
    
                            </div>
    
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">
                            Solicitar préstamo
                        </button>
    
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    
    const selectTipoPrestamo = (tipoPrestamo) => {
        // console.log(tipoPrestamo);

        const obj = {!! json_encode($tipos_de_prestamo) !!}

        const match = obj.find((tipo) => tipo.id == tipoPrestamo);

        const plazo = document.getElementById('plazo');
        plazo.value = match.unidad_maxima_pago;

        const tasa_interes = document.getElementById('tasa_interes');
        tasa_interes.value = match.tasa_interes;

        // const total = document.getElementById('total');
        // total.value = match.total;


        // console.log(obj)
        // console.log(match)
    }

    const calcularTotal = (monto) => {
        const plazo = document.getElementById('plazo').value;
        const tasa_interes = document.getElementById('tasa_interes').value;

        const subTotal = monto;
        const interes = ((monto * plazo) / 100 ) * tasa_interes;
        const costototal = (monto * plazo)  + interes;

        const total = document.getElementById('pago_total');
        const totalSend = document.getElementById('pago_total_send');
        total.value = costototal;
        totalSend.value = costototal;

        console.log(monto)
        console.log(interes)
        console.log(costototal)
    }
</script>

{{-- <script src="{{ asset('/js/solicitud_prestamo/index.js') }}"></script> --}}


@endsection