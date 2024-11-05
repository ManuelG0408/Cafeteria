<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductosNoPerecederos;
use App\Models\Productos;

class ProductosNoPerecederosController extends Controller
{
    
    public function index()
    {
        $productosNoPerecederos = ProductosNoPerecederos::with('producto')->get();
        return view('admin.productosnoperecederos.index', compact('productosNoPerecederos'));
    }

    
    public function create()
    {
        $productos = Productos::all(); 
        return view('admin.productosnoperecederos.create', compact('productos'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'existencia' => 'required|integer|min:0',
            'fecha_expiracion' => 'required|date|after:today',
        ]);

        ProductosNoPerecederos::create($request->all());
        return redirect()->route('productos_no_perecederos.index')->with('success', 'Producto no perecedero creado con éxito');
    }

    
    public function edit($id)
    {
        $productoNoPerecedero = ProductosNoPerecederos::findOrFail($id);
        $productos = Productos::all(); 
        return view('admin.productosnoperecederos.edit', compact('productoNoPerecedero', 'productos'));
    }

    
    public function update(Request $request, $id)
    {
        $productoNoPerecedero = ProductosNoPerecederos::findOrFail($id);

        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'existencia' => 'required|integer|min:0',
            'fecha_expiracion' => 'required|date|after:today',
        ]);

        $productoNoPerecedero->update($request->all());
        return redirect()->route('productos_no_perecederos.index')->with('success', 'Producto no perecedero actualizado con éxito');
    }

    
    public function destroy($id)
    {
        $productoNoPerecedero = ProductosNoPerecederos::findOrFail($id);
        $productoNoPerecedero->delete();
        return redirect()->route('productos_no_perecederos.index')->with('success', 'Producto no perecedero eliminado con éxito');
    }
}
