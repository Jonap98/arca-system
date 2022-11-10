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
                <h3>Solicitudes de ahorro</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarMonto">
                    Solicitar ahorro
                </button>
            </div>
            <hr class="mx-3">
            <div class="m-4">
                <div class="row">
                    @if (session('success'))
                        <div class="alert alert-primary mt-2" role="alert">
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
                                        <th>Folio</th>
                                        <th>Gmin</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Monto</th>
                                        <th>Status</th>
                                        <th>Acciones</th>
                                    </thead>
                                    @foreach ($solicitudes as $solicitud)
                                        <tr>
                                            <td>{{ $solicitud->folio }}</td>
                                            <td>{{ $solicitud->gmin_solicitante }}</td>
                                            <td>{{ $solicitud->nombres }}</td>
                                            <td>{{ $solicitud->paterno }}</td>
                                            <td>{{ $solicitud->monto_semanal }}</td>
                                            <td style="background-color:{{ $solicitud->color }}; color: #fff;" >{{ $solicitud->status }}</td>
                                            <td>  
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                      Acciones
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        {{-- <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#modalAjuste{{ $conteo->Id }}" onclick="enviarAccion({{ $conteo->Id }}, 'AjustePositivo')"> --}}
                                                        <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#autorizarAhorro{{ $solicitud->gmin_solicitante }}">
                                                            Autorizar
                                                        </button>
                                                        <button type="button" class="btn dropdown-item">
                                                            Revisar
                                                        </button>
                                                        <button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#rechazarAhorro{{ $solicitud->gmin_solicitante }}">
                                                            Rechazar
                                                        </button>
                                                        @if ($solicitud->status == 'AUTORIZADO')
                                                            <a href="{{ route('detalles-ahorro', $solicitud->gmin_solicitante) }}" class="btn btn-primary dropdown-item">
                                                                Ver detalles de solicitud
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('ahorro.autorizar')
                                        @include('ahorro.rechazar')
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