<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadosPedidos;

class EstadosPedidosController extends Controller
{
    
    public function index()
    {
        $estados_pedidos = EstadosPedidos::all();
        return view('admin.estadospedidos.index', [
            'estados_pedidos' => $estados_pedidos
        ]);
    }

    
    public function create()
    {
        return view('admin.estadospedidos.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'desc_estado_pedido' => 'required|string|max:255|unique:estados_pedidos',
        ]);

        EstadosPedidos::create($request->all());
        return redirect()->route('estados_pedidos.index')->with('success', 'Estado de pedido creado con éxito');
    }

    
    public function edit($id)
    {
        $estadoPedido = EstadosPedidos::findOrFail($id);
        return view('admin.estadospedidos.edit', compact('estadoPedido'));
    }

    
    public function update(Request $request, $id)
    {
        $estadoPedido = EstadosPedidos::findOrFail($id);

        $request->validate([
            'desc_estado_pedido' => 'required|string|max:255|unique:estados_pedidos,desc_estado_pedido,' . $estadoPedido->id_estado_pedido . ',id_estado_pedido',
        ]);

        $estadoPedido->update($request->all());
        return redirect()->route('estados_pedidos.index')->with('success', 'Estado de pedido actualizado con éxito');
    }

    // Eliminar un estado de pedido
    public function destroy($id)
    {
        $estadoPedido = EstadosPedidos::findOrFail($id);
        $estadoPedido->delete();
        return redirect()->route('estados_pedidos.index')->with('success', 'Estado de pedido eliminado con éxito');
    }
}
