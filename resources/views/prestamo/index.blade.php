@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection

@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between m-3">
                <h3>Solicitudes de préstamo</h3>
                @role('empleado')
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSolicitarPrestamo">
                    Solicitar préstamo
                </button>
                @endrole
            </div>
            <hr class="mx-3">
            <div class="m-4">
                <div class="row">
                    @if (session('success'))
                        <div class="alert alert-success mt-2" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors)
                        @foreach ($errors->all() as $errors)
                            <div class="alert alert-danger mt-2" role="alert">
                                <li>{{ $errors }}</li>
                                {{-- {{ session('error') }} --}}
                            </div>
                        @endforeach
                    @endif

                    <div class="card col-md-12">
                            
                            <div class="mt-2 table-responsive">
                                <table class="table table-striped" id="tableUsers">
                                    <thead style="background-color: #10375f; color: #fff">
                                        <th>Gmin</th>
                                        <th>Solicitante</th>
                                        <th>Monto</th>
                                        <th>Tipo</th>
                                        <th>Saldo</th>
                                        <th>Descuento</th>
                                        <th>Plazo</th>
                                        <th>Pagos pendientes</th>
                                        <th>Status</th>
                                        <th>Acciones</th>
                                        <th>Solicitud</th>
                                        <th>Identificación</th>
                                        <th>Comprobante domicilio</th>
                                    </thead>
                                    @foreach ($solicitudes as $solicitud)
                                        <tr>
                                            <td>{{ $solicitud->gmin_solicitante }}</td>
                                            <td>{{ $solicitud->nombres }} {{ $solicitud->paterno }} </td>
                                            <td>{{ $solicitud->monto }}</td>
                                            <td>{{ $solicitud->tipo_prestamo }}</td>
                                            <td>Saldo (calculado)</td>
                                            <td>Pago quincenal (calculado)</td>
                                            <td>{{ $solicitud->unidad_maxima_pago }}</td>
                                            <td>Pagos pendientes</td>
                                            
                                            <td style="background-color:{{ $solicitud->color }}; color: #fff;" >{{ $solicitud->status }}</td>
                                            <td>  
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                      Acciones
                                                    </button>
                                                    {{-- @role('arca')
                                                    <form method="POST" action="{{ route('solicitud-prestamo.download') }}">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $solicitud->id }}">
                                                        <button type="submit" class="btn btn-primary">
                                                            Descargar documentos
                                                        </button>
                                                    </form>
                                                    @endrole --}}
                                                    <div class="dropdown-menu">
                                                        @role('arca')
                                                            {{-- <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#modalAjuste{{ $conteo->Id }}" onclick="enviarAccion({{ $conteo->Id }}, 'AjustePositivo')"> --}}
                                                            <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#autorizarPrestamo{{ $solicitud->id }}">
                                                                Autorizar
                                                            </button>
                                                            <button type="button" class="btn dropdown-item">
                                                                Revisar
                                                            </button>
                                                            <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#rechazarPrestamo{{ $solicitud->id }}">
                                                                Rechazar
                                                            </button>
                                                        @endrole
                                                        @if ($solicitud->status == 'AUTORIZADO')
                                                            <a href="{{ route('detalles-ahorro', $solicitud->gmin_solicitante) }}" class="btn btn-primary dropdown-item">
                                                                Ver detalles de solicitud
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ Storage::url($solicitud->archivo_solicitud) }}" target="_blank" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-post-fill" viewBox="0 0 16 16">
                                                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-5-.5H7a.5.5 0 0 1 0 1H4.5a.5.5 0 0 1 0-1zm0 3h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5z"/>
                                                    </svg>
                                                    Solicitud
                                                </a>
                                                {{-- <iframe height="400" width="400" src="{{ Storage::url($solicitud->archivo_solicitud) }}" frameborder="0"></iframe> --}}
                                            </td>
                                            <td>
                                                <a href="{{ Storage::url($solicitud->archivo_identificacion) }}" target="_blank" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                                                    </svg>
                                                    Identificación
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ Storage::url($solicitud->archivo_comprobante_domicilio) }}" target="_blank" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox2" viewBox="0 0 16 16">
                                                        <path d="M9 8.5h2.793l.853.854A.5.5 0 0 0 13 9.5h1a.5.5 0 0 0 .5-.5V8a.5.5 0 0 0-.5-.5H9v1z"/>
                                                        <path d="M12 3H4a4 4 0 0 0-4 4v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7a4 4 0 0 0-4-4zM8 7a3.99 3.99 0 0 0-1.354-3H12a3 3 0 0 1 3 3v6H8V7zm-3.415.157C4.42 7.087 4.218 7 4 7c-.218 0-.42.086-.585.157C3.164 7.264 3 7.334 3 7a1 1 0 0 1 2 0c0 .334-.164.264-.415.157z"/>
                                                    </svg>
                                                    Comprobante 
                                                </a>
                                            </td>
                                        </tr>
                                        @role('arca')
                                            @include('prestamo.autorizar')
                                            @include('prestamo.rechazar')
                                        @endrole
                                        {{-- @include('ahorro.detalles_ahorro.edit') --}}

                                    @endforeach
                                    {{-- <tr>
                                        <td> dummie</td>
                                        <td> dummie</td>
                                        <td> dummie</td>
                                        <td> dummie</td>
                                        <td> dummie</td>
                                        <td> dummie</td>
                                        <td> dummie</td>
                                    </tr> --}}
                                    
                                </table>
                            </div>

                            
                            
                        </div>
                        @include('ahorro.solicitar')


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#tableUsers').DataTable({
                order: [0, 'desc']
            });
        });
    </script>

@endsection