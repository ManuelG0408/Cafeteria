<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PuestosController;
use App\Http\Controllers\ExtrasController;
use App\Http\Controllers\TiposClientesController;
use App\Http\Controllers\DisponibilidadesController;
use App\Http\Controllers\EstadosPedidosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProovedoresController;
<<<<<<< HEAD
use App\Http\Controllers\PedidosController;
=======
use App\Http\Controllers\ProductosPerecederosController;
>>>>>>> 08fbd233c925a3e5e98962aa3f827497d8b4f591
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EntradasController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::apiResource('/home/usuarios', UsuariosController::class);
Route::apiResource('/home/clientes', ClientesController::class);
Route::apiResource('/home/tipos_clientes', TiposClientesController::class);
Route::apiResource('/home/puestos', PuestosController::class);
Route::apiResource('/home/extras', ExtrasController::class);
Route::apiResource('/home/disponibilidades', DisponibilidadesController::class);
Route::apiResource('/home/estados_pedidos', EstadosPedidosController::class);
Route::apiResource('/home/categorias', CategoriasController::class);
Route::apiResource('/home/proovedores', ProovedoresController::class);
Route::apiResource('/home/empleados', EmpleadosController::class);
Route::apiResource('/home/pedidos', PedidosController::class);
Route::apiResource('/home/productos', ProductosController::class);
<<<<<<< HEAD
Route::apiResource('/home/entradas', EntradasController::class);

=======
Route::apiResource('/home/productos_perecederos', ProductosPerecederosController::class);
>>>>>>> 08fbd233c925a3e5e98962aa3f827497d8b4f591
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
