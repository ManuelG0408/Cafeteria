<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadosPedidos;

class EstadosPedidosController extends Controller
{
    public function index()
    {
        $estados_pedidos = EstadosPedidos::all();
        return view('admin.estadospedidos.index',[
            'estados_pedidos' => $estados_pedidos
        ]);
    }
}
