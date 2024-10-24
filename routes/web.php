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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas de recursos
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

// Ruta para mostrar las imágenes de los productos
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

// Ruta de perfil
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
