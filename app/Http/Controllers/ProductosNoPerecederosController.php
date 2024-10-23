<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductosNoPerecederos;

class ProductosNoPerecederosController extends Controller
{
    public function index()
    {

        $productos_no_perecederos = ProductosNoPerecederos::all(); // Obtener todos los usuarios
        return view('admin.productosnoperecederos.index', [ // Asegúrate de usar la notación de puntos
            'productos_no_perecederos' => $productos_no_perecederos // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
    }
}
