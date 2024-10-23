<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;

class PedidosController extends Controller
{
    public function index()
    {

        $pedidos = Pedidos::all(); // Obtener todos los usuarios
        return view('admin.pedidos.index', [ // Asegúrate de usar la notación de puntos
            'pedidos' => $pedidos // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
    }
}
