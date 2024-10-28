<?php

namespace App\Http\Controllers;

use App\Models\DetallesPedidos;
use App\Models\Pedidos;
use Illuminate\Http\Request;

class DetallesPedidosController extends Controller
{
    public function index()
    {
        // Obtener todos los detalles de pedidos con sus productos y pedidos asociados
        $detalles = DetallesPedidos::with(['pedido', 'producto'])->get();
        return view('admin.detallespedidos.index', compact('detalles'));
    }

    public function show($id)
    {
        // Obtiene el pedido y sus detalles relacionados
        $pedido = Pedidos::findOrFail($id);
        $detalles = $pedido->detalles; // Asumiendo que tienes la relación definida en el modelo

        return view('admin.detallespedidos.show', compact('pedido', 'detalles'));
    }
}
