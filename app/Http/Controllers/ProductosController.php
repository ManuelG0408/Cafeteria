<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
class ProductosController extends Controller
{
    public function index()
    {

        $productos = Productos::all(); // Obtener todos los usuarios
        return view('admin.productos.index', [ // Asegúrate de usar la notación de puntos
            'productos' => $productos // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
    }
}
