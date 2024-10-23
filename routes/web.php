<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;
<<<<<<< HEAD
=======
use App\Http\Controllers\PuestosController;
use App\Http\Controllers\ExtrasController;
use App\Http\Controllers\TiposClientesController;
>>>>>>> 21dec96d689ccdf10259dfe01d956d2d4a6ee4fa

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<<<<<<< HEAD
Route::apiResource('usuarios', UsuariosController::class);
Route::apiResource('clientes', ClientesController::class);
=======
Route::apiResource('/home/usuarios', UsuariosController::class);
Route::apiResource('/home/clientes', ClientesController::class);
Route::apiResource('/home/tipos_clientes', TiposClientesController::class);
Route::apiResource('/home/puestos', PuestosController::class);
Route::apiResource('/home/extras', ExtrasController::class);
>>>>>>> 21dec96d689ccdf10259dfe01d956d2d4a6ee4fa
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
