<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Clientes;
use App\Models\EstadosPedidos;

class PedidosController extends Controller
{
    public function index()
    {

        $pedidos = Pedidos::all(); // Obtener todos los usuarios
        return view('admin.pedidos.index', [ // Asegúrate de usar la notación de puntos
            'pedidos' => $pedidos // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

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

    public function edit(Pedidos $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedidos $pedido)
    {
        $request->validate([
            'fecha_pedido' => 'required|date',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_estado_pedido' => 'required|exists:estados_pedidos,id_estado_pedido',
            'total' => 'required|numeric|min:0',
            'comentarios' => 'nullable|string|max:255',
        ]);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('message', 'Pedido actualizado exitosamente.');
    }

    public function destroy(Pedidos $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('message', 'Pedido eliminado exitosamente.');
    }
}
