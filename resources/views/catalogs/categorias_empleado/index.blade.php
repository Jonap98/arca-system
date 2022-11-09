@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between m-3">
                <h3>Categorías de empleado</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearCategoria">
                    Crear categoría
                </button>
            </div>
            <hr class="mx-3">
            <div class="m-4">
                <div class="row">
                    <div class="card col-md-12">
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
                        <div class="mt-2 table-responsive">
                            <table id="categoriasEmpleado" class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Categoría de empleado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td>{{ $categoria->id }}</td>
                                            <td>{{ $categoria->tipo_empleado }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria{{ $categoria->id }}">
                                                    Editar
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarCategoria{{ $categoria->id }}">
                                                    Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                        @include('catalogs.categorias_empleado.edit')
                                        @include('catalogs.categorias_empleado.delete')
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>

                        @include('catalogs.categorias_empleado.create')

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
            $('#categoriasEmpleado').DataTable({
                order: [0, 'desc']
            });
        });
    </script>

@endsection