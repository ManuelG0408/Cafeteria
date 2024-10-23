<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallesPedidos;

class DetallesPedidosController extends Controller
{
    public function index()
    {
        $detalles_pedidos = DetallesPedidos::all();
        return view('admin.detallespedidos.index',[
            'detalles_pedidos' => $detalles_pedidos
        ]);
    }
}
