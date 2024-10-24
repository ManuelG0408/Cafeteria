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
    public function create()
    {
        return view('admin.estadospedidos.create');
    }

    // Método para almacenar un nuevo estado de pedido
    public function store(Request $request)
    {
        $request->validate([
            'desc_estado_pedido' => 'required|string|max:255',
        ]);

        EstadosPedidos::create([
            'desc_estado_pedido' => $request->desc_estado_pedido,
        ]);

        return redirect()->route('estados_pedidos.index')->with('success', 'Estado de pedido creado con éxito');
    }
}
