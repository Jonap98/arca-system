@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between m-3">
                <h3>Estatus empresa</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearEtatus">
                    Crear estatus
                </button>
            </div>
            <hr class="mx-3">
            <div class="m-4">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="mt-2 table-responsive">
                            <table id="estatusEmpresa" class="table table-striped">
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
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarEstatus">
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarEstatus">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Uno</td>
                                        <td>Dos</td>
                                        <td>Tres</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarEstatus">
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarEstatus">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @include('catalogs.estatus_empresa.edit')
                                @include('catalogs.estatus_empresa.delete')

                                </tbody>
                            </table>
                        </div>

                        @include('catalogs.estatus_empresa.create')

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
            $('#estatusEmpresa').DataTable({
                order: [0, 'desc']
            });
        });
    </script>

@endsection