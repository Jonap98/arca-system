@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-between m-3">
                <h3>Perfil ahorrador</h3>
                <a href="{{ route('perfil-ahorrador.create') }}" class="btn btn-primary">
                    Crear perfil ahorrador
                </a>
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
                            <table id="estatusEmpresa" class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">GMIN</th>
                                        <th scope="col">Apellido P</th>
                                        <th scope="col">Apellido M</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perfiles as $perfil)
                                        <tr>
                                            <td>{{ $perfil->gmin }}</td>
                                            <td>{{ $perfil->paterno }}</td>
                                            <td>{{ $perfil->materno }}</td>
                                            <td>{{ $perfil->nombres }}</td>
                                            <td>
                                                {{-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarPerfil{{ $perfil->gmin }}">
                                                    Editar
                                                </button> --}}
                                                <a href="{{ route('perfil-ahorrador.details', $perfil->gmin ) }}" class="btn btn-success">Detalles</a>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarPerfil{{ $perfil->gmin }}">
                                                    Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                        @include('perfil_ahorrador.delete')
                                    @endforeach
                                    
                                {{-- @include('perfil_ahorrador.edit') --}}

                                </tbody>
                            </table>
                        </div>


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