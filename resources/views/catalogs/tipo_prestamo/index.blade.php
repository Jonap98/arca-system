@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between m-3">
                <h3>Tipo de préstamo</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearPrestamo">
                    Crear tipo de préstamo
                </button>
            </div>
            <hr class="mx-3">
            <div class="m-4">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="mt-2 table-responsive">
                            <table id="prestamo" class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Uno</th>
                                        <th scope="col">Dos</th>
                                        <th scope="col">Tres</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Uno</td>
                                        <td>cuatro</td>
                                        <td>Tres</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarPrestamo">
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarPrestamo">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Uno</td>
                                        <td>Dos</td>
                                        <td>Tres</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarPrestamo">
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarPrestamo">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @include('catalogs.tipo_prestamo.edit')
                                @include('catalogs.tipo_prestamo.delete')

                                </tbody>
                            </table>
                        </div>

                        @include('catalogs.tipo_prestamo.create')

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
            $('#prestamo').DataTable({
                order: [0, 'desc']
            });
        });
    </script>

@endsection