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
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductosPerecederosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\DetallesPedidosController;
use App\Http\Controllers\AsignaExtrasPedidosController;
use App\Http\Controllers\ProductosNoPerecederosController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/home/usuarios', UsuariosController::class);
Route::resource('/home/clientes', ClientesController::class);
Route::resource('/home/tipos_clientes', TiposClientesController::class);
Route::resource('/home/puestos', PuestosController::class);
Route::resource('/home/extras', ExtrasController::class);
Route::resource('/home/disponibilidades', DisponibilidadesController::class);
Route::resource('/home/estados_pedidos', EstadosPedidosController::class);
Route::resource('/home/categorias', CategoriasController::class);
Route::resource('/home/empleados', EmpleadosController::class);
Route::resource('/home/pedidos', PedidosController::class);
Route::resource('/home/productos', ProductosController::class);
Route::resource('/home/proovedores', ProovedoresController::class);
Route::resource('/home/entradas', EntradasController::class);
Route::resource('/home/productos_perecederos', ProductosPerecederosController::class);
Route::resource('/home/detalles_pedidos', DetallesPedidosController::class);
Route::resource('/home/asigna_extras_pedidos', AsignaExtrasPedidosController::class);
Route::resource('/home/productos_no_perecederos', ProductosNoPerecederosController::class);
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');