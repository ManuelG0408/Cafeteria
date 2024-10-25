<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductosNoPerecederos;
use App\Models\Productos;

class ProductosNoPerecederosController extends Controller
{
    public function index()
    {

        $productos_no_perecederos = ProductosNoPerecederos::all(); // Obtener todos los usuarios
        return view('admin.productosnoperecederos.index', [ // Asegúrate de usar la notación de puntos
            'productos_no_perecederos' => $productos_no_perecederos // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
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
            'fecha_expiracion' => 'required|date',
        ]);

        ProductosNoPerecederos::create($request->all());

        return redirect()->route('productosnoperecederos.index')->with('message', 'Producto No Perecedero creado exitosamente.');
    }

    public function edit(ProductosNoPerecederos $productoNoPerecedero)
    {
        return view('productosnoperecederos.edit', compact('productoNoPerecedero'));
    }

    public function update(Request $request, ProductosNoPerecederos $productoNoPerecedero)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'existencia' => 'required|integer|min:0',
            'fecha_expiracion' => 'required|date',
        ]);

        $productoNoPerecedero->update($request->all());

        return redirect()->route('productosnoperecederos.index')->with('message', 'Producto No Perecedero actualizado exitosamente.');
    }

    public function destroy(ProductosNoPerecederos $productoNoPerecedero)
    {
        $productoNoPerecedero->delete();
        return redirect()->route('productosnoperecederos.index')->with('message', 'Producto No Perecedero eliminado exitosamente.');
    }
}
