<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Pedidos;
use App\Models\DetallesPedidos;

class CarritoController extends Controller
{
    public function agregar(Request $request, $id)
    {
        $producto = Productos::findOrFail($id);
        $cantidad = $request->input('cantidad', 1);

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += $cantidad;
        } else {
            $carrito[$id] = [
                'nombre' => $producto->nom_producto,
                'precio' => $producto->precio,
                'cantidad' => $cantidad,
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito');

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }

    public function verCarrito()
    {
        return view('admin.carrito.index', [
            'carrito' => session()->get('carrito', [])
        ]);
    }

    public function realizarPedido(Request $request)
{
    
    $estadoPendienteId = 1; 

    $pedido = new Pedidos();
    $pedido->fecha_pedido = now();
    $pedido->id_cliente = auth()->id(); 
    $pedido->total = $this->calcularTotal();

    
    $pedido->comentarios = $request->input('comentarios', 'Sin comentarios');

    
    $pedido->id_estado_pedido = $estadoPendienteId; 
    $pedido->save();

    $carrito = session()->get('carrito', []);

    foreach ($carrito as $id => $item) {
        DetallesPedidos::create([
            'id_pedido' => $pedido->id_pedido,
            'id_producto' => $id,
            'cantidad' => $item['cantidad'],
            'subtotal' => $item['precio'] * $item['cantidad'],
        ]);
    }

    session()->forget('carrito'); 

    return redirect()->route('pedidos.index')->with('success', 'Pedido realizado con éxito.');
}


    public function vaciarCarrito()
    {
        
        session()->forget('carrito');

        return redirect()->back()->with('success', 'El carrito ha sido vaciado.');
    }

    private function calcularTotal()
    {
        $total = 0;
        $carrito = session()->get('carrito', []);

        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return $total;
    }

    
}
