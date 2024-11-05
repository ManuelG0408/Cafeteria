<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Clientes;
use App\Models\EstadosPedidos;
use Carbon\Carbon;

class PedidosController extends Controller
{
    public function index()
    {

        $pedidos = Pedidos::all(); 
        return view('admin.pedidos.index', [ 
            'pedidos' => $pedidos 

        ]);
    }

    public function create()
    {
        $clientes = Clientes::all();
        $estados_pedidos = EstadosPedidos::all();
        return view('admin.pedidos.create', compact('clientes','estados_pedidos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_pedido' => 'required|date',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_estado_pedido' => 'required|exists:estados_pedidos,id_estado_pedido',
            'total' => 'required|numeric|min:0',
            'comentarios' => 'nullable|string|max:255',
        ]);

        Pedidos::create($request->all());

        return redirect()->route('pedidos.index')->with('message', 'Pedido creado exitosamente.');
    }

    public function edit($id)
    {
        $pedido = Pedidos::findOrFail($id);
        
        
        $pedido->fecha_pedido = Carbon::parse($pedido->fecha_pedido);
        
        $clientes = Clientes::all(); 
        $estados = EstadosPedidos::all(); 

        return view('admin.pedidos.edit', compact('pedido', 'clientes', 'estados'));
    }

    public function update(Request $request, Pedidos $pedido)
{
    $request->validate([
        'id_estado_pedido' => 'required|exists:estados_pedidos,id_estado_pedido',
    ]);

    
    $pedido->update(['id_estado_pedido' => $request->id_estado_pedido]);

    return redirect()->route('pedidos.index')->with('message', 'Estado del pedido actualizado exitosamente.');
}


    public function destroy(Pedidos $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('message', 'Pedido eliminado exitosamente.');
    }
}
