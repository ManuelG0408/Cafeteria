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
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

Route::get('producto/imagen/{filename}', function ($filename) {
    $path = storage_path('app/private/public/imagenes/' . $filename);

    if (!File::exists($path)) {
        abort(404); // Retornar error 404 si no se encuentra el archivo
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

Route::post('/home/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/home/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::patch('/home/carrito/actualizar/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
Route::get('/home/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');
Route::post('/home/carrito/vaciar', [CarritoController::class, 'vaciarCarrito'])->name('carrito.vaciar');
Route::post('/home/pedidos', [CarritoController::class, 'realizarPedido'])->name('pedidos.realizar');
Route::get('/home/pedidos/{pedido}/detalles', [DetallesPedidosController::class, 'show'])->name('pedidos.detalles');

