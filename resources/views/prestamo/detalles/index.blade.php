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
                <h3>Detalles de prestamo</h3>
                @role('empleado')
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarMonto">
                    Modificar ahorro
                </button>
                @endrole
            </div>
            <hr class="mx-3">
            <div class="m-4">
                <div class="row">
                    <div class="card p-2 alert alert-primary">
                        {{-- <span>Semana actual: <b>{{ $semana_actual }}</b></span>
                        <span>Ahorro autorizado en la semana: <b>{{ $ahorro->first()->semana }}</b></span> --}}
                    </div>

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
                                <table class="table table-striped" id="detalles-ahorro">
                                    <thead style="background-color: #10375f; color: #fff">
                                        <th>Folio</th>
                                        <th>Monto semanal</th>
                                        <th>Semana</th>
                                        <th>Gmin</th>
                                        <th>Nombre</th>
                                        {{-- <th>Apellido paterno</th>
                                        <th>Apellido materno</th> --}}
                                        <th>Acciones</th>
                                    </thead>
                                    @foreach ($ahorro as $ahorro_semanal)
                                        <tr>
                                            <td>{{ $ahorro_semanal->folio }}</td>
                                            <td>${{ $ahorro_semanal->monto_semanal }}</td>
                                            <td>{{ $ahorro_semanal->semana }}</td>
                                            <td>{{ $ahorro_semanal->gmin_solicitante }}</td>
                                            <td>{{ $solicitante->nombres }} {{ $solicitante->paterno }} {{ $solicitante->materno }}</td>
                                            {{-- <td>{{ $solicitante->paterno }}</td> --}}
                                            {{-- <td>{{ $solicitante->materno }}</td> --}}
                                            <td>Acciones</td>
                                        </tr>
                                    @include('ahorro.detalles_ahorro.edit')

                                    @endforeach
                                    
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
            $('#detalles-ahorro').DataTable({
                order: [0, 'desc']
            });
        });
    </script>

@endsection