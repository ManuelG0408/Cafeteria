@vite(['resources/css/sb-admin-2.css'])

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Dashboard</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-orange sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{ asset('images/logocafeblanco.png') }}" alt="Logo Café" style="width: 50px; ">
                </div>
                <div class="sidebar-brand-text mx-3">La Cafe<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Tablas</div>

            @role('admin')
            <li class="nav-item">
                <a class="nav-link" href="/usuarios">
                    <i class="bx bxs-user"></i>
                    <span>Usuarios</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/clientes">
                    <i class="bx bxs-user-account"></i>
                    <span>Clientes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/proveedores">
                    <i class="bx bx-grid-alt"></i>
                    <span>Proveedores</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/empleados">
                    <i class="bx bx-user"></i>
                    <span>Empleados</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/puestos">
                    <i class='bx bxs-pin'></i>
                    <span>Puestos</span>
                </a>
            </li>
            @endrole

            <li class="nav-item">
                <a class="nav-link" href="/home/productos">
                    <i class='bx bxs-cart'></i>
                    <span>Productos</span>
                </a>
            </li>

            @role('admin')
            
            <li class="nav-item">
                <a class="nav-link" href="/home/productos">
                    <i class='bx bxs-cart'></i>
                    <span>Categorias</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/home/productos">
                    <i class='bx bxs-cart'></i>
                    <span>Extras</span>
                </a>
            </li>  

            <li class="nav-item">
                <a class="nav-link" href="/home/inventario">
                    <i class="bx bx-box"></i>
                    <span>Inventario</span>
                </a>
            </li>
            @endrole

            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="bx bx-log-out"></i>
                    <span>Home</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            
            <!-- Main Content -->
            <div id="content">

                @extends('layouts.app')

                @section('content')

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">¡Bienvenidooooooooo!</h1> 

                        @role("cliente")
                        <h1 class="h3 mb-0 text-gray-800">¡Hola Carlos!</h1>                      
                        @endrole
                    </div>
                </div>


            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>
</html>


@endsection
