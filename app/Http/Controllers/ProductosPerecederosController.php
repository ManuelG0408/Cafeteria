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
        return view('admin.productosperecederos.create', compact('productos','disponibilidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_producto' => 'required',
            'id_disponibilidad' => 'required',
        ]);

        ProductosPerecederos::create($request->all());

        return redirect()->route('productosperecederos.index')->with('success', 'Producto perecedero creado correctamente.');
    }

    public function show(ProductosPerecederos $productoPerecedero)
    {
        return view('productosperecederos.show', compact('productoPerecedero'));
    }

    public function edit(ProductosPerecederos $productoPerecedero)
    {
        return view('productosperecederos.edit', compact('productoPerecedero'));
    }

    public function update(Request $request, ProductosPerecederos $productoPerecedero)
    {
        $request->validate([
            'id_producto' => 'required',
            'id_disponibilidad' => 'required',
        ]);

        $productoPerecedero->update($request->all());

        return redirect()->route('productos_perecederos.index')->with('success', 'Producto perecedero actualizado correctamente.');
    }

    public function destroy(ProductosPerecederos $productoPerecedero)
    {
        $productoPerecedero->delete();
        return redirect()->route('productos_perecederos.index')->with('success', 'Producto perecedero eliminado correctamente.');
    }
}
