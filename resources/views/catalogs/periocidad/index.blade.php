@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between m-3">
                <h3>Periocidad</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearPeriocidad">
                    Crear periocidad
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

                    @if (session('error'))
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card col-md-12">
                        <div class="mt-2 table-responsive">
                            <table id="periocidad" class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Días</th>
                                        <th scope="col">Periodo</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($periodos as $periodo)
                                        <tr>
                                            <td>{{ $periodo->dias }}</td>
                                            <td>{{ $periodo->periodo }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarPeriocidad{{ $periodo->id }}">
                                                    Editar
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarPeriocidad{{ $periodo->id }}">
                                                    Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                        @include('catalogs.periocidad.edit')
                                        @include('catalogs.periocidad.delete')
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        @include('catalogs.periocidad.create')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#periocidad').DataTable({
                order: [0, 'desc']
            });
        });
    </script>

@endsection