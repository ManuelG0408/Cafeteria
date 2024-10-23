<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PuestosController;
use App\Http\Controllers\TiposClientesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::apiResource('/home/usuarios', UsuariosController::class);
Route::apiResource('/home/clientes', ClientesController::class);
Route::apiResource('/home/tipos_clientes', TiposClientesController::class);
Route::apiResource('/home/puestos', PuestosController::class);
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
