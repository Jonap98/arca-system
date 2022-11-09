@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between m-3">
                <h3>Plantas</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearPlanta">
                    Crear planta
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
                            <table id="plantas" class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Planta</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plantas as $planta)
                                        <tr>
                                            <td>{{ $planta->id }}</td>
                                            <td>{{ $planta->planta }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarPlanta{{ $planta->id }}">
                                                    Editar
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarPlanta{{ $planta->id }}">
                                                    Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                        
                                    @include('catalogs.plantas.edit')
                                    @include('catalogs.plantas.delete')
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @include('catalogs.plantas.create')

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
            $('#plantas').DataTable({
                order: [0, 'desc']
            });
        });
    </script>

@endsection