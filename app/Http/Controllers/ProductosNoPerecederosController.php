<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductosNoPerecederos;
use App\Models\Productos;

class ProductosNoPerecederosController extends Controller
{
    // Mostrar todos los productos no perecederos
    public function index()
    {
        $productosNoPerecederos = ProductosNoPerecederos::with('producto')->get();
        return view('admin.productosnoperecederos.index', compact('productosNoPerecederos'));
    }

    // Mostrar formulario para crear un nuevo producto no perecedero
    public function create()
    {
        $productos = Productos::all(); // Obtener todos los productos para seleccionar
        return view('admin.productosnoperecederos.create', compact('productos'));
    }

    // Almacenar el nuevo producto no perecedero
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

    // Mostrar formulario para editar un producto no perecedero
    public function edit($id)
    {
        $productoNoPerecedero = ProductosNoPerecederos::findOrFail($id);
        $productos = Productos::all(); // Obtener todos los productos para seleccionar
        return view('admin.productosnoperecederos.edit', compact('productoNoPerecedero', 'productos'));
    }

    // Actualizar el producto no perecedero
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

    // Eliminar un producto no perecedero
    public function destroy($id)
    {
        $productoNoPerecedero = ProductosNoPerecederos::findOrFail($id);
        $productoNoPerecedero->delete();
        return redirect()->route('productos_no_perecederos.index')->with('success', 'Producto no perecedero eliminado con éxito');
    }
}
