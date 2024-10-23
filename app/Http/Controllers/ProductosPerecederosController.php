<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductosPerecederos;
class ProductosPerecederosController extends Controller
{
    public function index()
    {

        $productos_perecederos = ProductosPerecederos::all(); // Obtener todos los usuarios
        return view('admin.productosperecederos.index', [ // Asegúrate de usar la notación de puntos
            'productos_perecederos' => $productos_perecederos // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
    }
}
