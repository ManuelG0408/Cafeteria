@vite(['resources/css/sb-admin-2.css'])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>

    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }
    .dropdown-menu {
        margin-top: 0;
    }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-orange sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{ asset('images/logocafeblanco.png') }}" alt="Logo Café" style="width: 50px;">
                </div>
                <div class="sidebar-brand-text mx-3">La Cafe<sup></sup></div>
            </a>

            <hr class="sidebar-divider my-0">
            <hr class="sidebar-divider">

            <div class="sidebar-heading">Tablas</div>

            @role('admin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/home/usuarios" id="usuariosDropdown" role="button">
                    <i class="bx bxs-user"></i>
                    <span>Usuarios</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="usuariosDropdown">
                    <a class="dropdown-item" href="/home/clientes">Clientes</a>
                    <a class="dropdown-item" href="/home/empleados">Empleados</a>
                    <a class="dropdown-item" href="/home/proovedores">Proveedores</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/home/productos" id="usuariosDropdown" role="button">
                    <i class="bx bxs-user"></i>
                    <span>Productos</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="usuariosDropdown">
                    <a class="dropdown-item" href="/home/productos_perecederos">Perecederos</a>
                    <a class="dropdown-item" href="/home/productos_no_perecederos">No Perecederos</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/home/pedidos" id="usuariosDropdown" role="button">
                    <i class="bx bxs-user"></i>
                    <span>Pedidos</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="usuariosDropdown">
                    <a class="dropdown-item" href="/home/estados_pedidos">Estados del Pedido</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/tipos_clientes">
                    <i class="bx bx-box"></i>
                    <span>Tipo de Cliente</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/puestos">
                    <i class='bx bxs-pin'></i>
                    <span>Puestos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/entradas">
                    <i class="bx bx-box"></i>
                    <span>Entradas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/categorias">
                    <i class="bx bx-box"></i>
                    <span>Categorias</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/disponibilidades">
                    <i class="bx bx-box"></i>
                    <span>Disponibilidades</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/extras">
                    <i class="bx bx-box"></i>
                    <span>Extras</span>
                </a>
            </li>

            @endrole

            @unlessrole('admin') 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/home/productos" id="usuariosDropdown" role="button">
                    <i class="bx bxs-user"></i>
                    <span>Productos</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="usuariosDropdown">
                    <a class="dropdown-item" href="/home/productos_perecederos">Perecederos</a>
                    <a class="dropdown-item" href="/home/productos_no_perecederos">No Perecederos</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/pedidos">
                    <i class="bx bx-box"></i>
                    <span>Pedidos</span>
                </a>
            </li>

            @endunlessrole

            <li class="nav-item">
                <a class="nav-link" href="/home">
                    <i class="bx bx-log-out"></i>
                    <span>Home</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @extends('layouts.app')

                @section('content')

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">¡Bienvenido!</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>
</html>

@endsection
