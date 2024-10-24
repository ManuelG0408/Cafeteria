<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
class ProductosController extends Controller
{
    public function index()
    {

        $productos = Productos::all(); // Obtener todos los usuarios
        return view('admin.productos.index', [ // Asegúrate de usar la notación de puntos
            'productos' => $productos // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
    }


    // Mostrar formulario de creación
    public function create()
    {
        $categorias = Categorias::all();
        return view('admin.productos.create', compact('categorias'));
    }

    // Almacenar el nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nom_producto' => 'required|string|max:255|unique:productos',
            'desc_producto' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/imagenes');
            $data['imagen'] = basename($path);
        }

        Productos::create($data);
        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $producto = Productos::findOrFail($id);
        $categorias = Categorias::all();
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $producto = Productos::findOrFail($id);

        $request->validate([
            'nom_producto' => 'required|string|max:255|unique:productos,nom_producto,' . $producto->id_producto,
            'desc_producto' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/imagenes');
            $data['imagen'] = basename($path);
        }

        $producto->update($data);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito');
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito');
    }
    

}