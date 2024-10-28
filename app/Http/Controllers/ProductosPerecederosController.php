<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductosPerecederos;
use App\Models\Productos;
use App\Models\Disponibilidades;
class ProductosPerecederosController extends Controller
{
    public function index()
    {

        $productos_perecederos = ProductosPerecederos::all(); // Obtener todos los usuarios
        return view('admin.productosperecederos.index', [ // Asegúrate de usar la notación de puntos
            'productos_perecederos' => $productos_perecederos // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
    }

    public function create()
    {
        $productos = Productos::all();
        $disponibilidades = Disponibilidades::all();
        return view('admin.productosperecederos.create', compact('productos', 'disponibilidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'id_disponibilidad' => 'required|exists:disponibilidades,id_disponibilidad',
        ]);

        ProductosPerecederos::create($request->all());

        return redirect()->route('productos_perecederos.index')->with('success', 'Producto perecedero agregado con éxito.');
    }

    public function edit($id)
    {
        $productoPerecedero = ProductosPerecederos::findOrFail($id); // Asegúrate de que esta línea se ejecute sin errores.
        $productos = Productos::all(); // Obtener todos los productos
        $disponibilidades = Disponibilidades::all(); // Obtener todas las disponibilidades

        return view('admin.productosperecederos.edit', compact('productoPerecedero', 'productos', 'disponibilidades'));
    }


    public function update(Request $request, $id)
    {
        $productoPerecedero = ProductosPerecederos::findOrFail($id);

        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'id_disponibilidad' => 'required|exists:disponibilidades,id_disponibilidad',
        ]);

        $productoPerecedero->update($request->all());

            return redirect()->route('productos_perecederos.index')->with('success', 'Producto perecedero actualizado con éxito.');
    }

    public function destroy($id)
    {
        $productoPerecedero = ProductosPerecederos::findOrFail($id);
        $productoPerecedero->delete();
        return redirect()->route('productos_perecederos.index')->with('success', 'Producto perecedero eliminado con éxito');
    }

}
