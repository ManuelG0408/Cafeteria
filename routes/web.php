<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ClientesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::apiResource('usuarios', UsuariosController::class);
Route::apiResource('clientes', ClientesController::class);
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
