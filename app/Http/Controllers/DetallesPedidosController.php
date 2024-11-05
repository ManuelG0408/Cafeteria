<?php

namespace App\Http\Controllers;

use App\Models\DetallesPedidos;
use App\Models\Pedidos;
use Illuminate\Http\Request;

class DetallesPedidosController extends Controller
{
    public function index()
    {
        
        $detalles = DetallesPedidos::with(['pedido', 'producto'])->get();
        return view('admin.detallespedidos.index', compact('detalles'));
    }

    public function show($id)
    {
        
        $pedido = Pedidos::findOrFail($id);
        $detalles = $pedido->detalles; 

        return view('admin.detallespedidos.show', compact('pedido', 'detalles'));
    }
}
