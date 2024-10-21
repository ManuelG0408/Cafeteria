@extends('layouts.dashboard')

@section('content')
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Nube Colectiva">
    <link rel="icon" href="/img/logo_farmacia.png" />
    <meta name="theme-color" content="#000000" />
    <title>Clientes</title>

    @vite(['resources/js/app.js'])

    <style>
        .navbar-search .form-control {
            width: 400px;
        }
    </style>
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="header">
            <h1>Usuarios</h1>

            <div class="row">
                <div class="col-lg-10">
                    <!-- Topbar Search -->
                    <form id="globalSearchForm" class="d-none d-sm-inline-block form-inline my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" id="searchInput" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="bx bx-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="page-content mt-4">
            @if(Session::has('message'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>E-mail</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="personasContainer">
                    @foreach($usuarios as $usu)
                    <tr>
                        <td>{{ $usu->nombre }} {{ $usu->apellido_paterno }} {{ $usu->apellido_materno }}</td>
                        <td>{{ $usu->telefono }}</td>
                        <td>{{ $usu->email }}</td>
                        <td>
                            <a href="" class="btn btn-dark">Detalles</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete{{ $usu->id }}">
                                Eliminar
                            </button>

                            <!-- Modal de Confirmación de Eliminación -->
                            <div class="modal fade" id="confirmDelete{{ $usu->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel{{ $usu->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteLabel{{ $usu->id }}">Confirmar Eliminación</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar a {{ $usu->nombre }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('usuarios.destroy', $usu->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr>
    </div>

    <footer class="text-muted mt-3 mb-3">
        <div align="center">
            Desarrollado Por Equipo Manuel
        </div>
    </footer>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#personasContainer tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>
@endsection
