<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return view('admin.categorias.index',[
            'categorias' => $categorias
        ]);
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_categoria' => 'required|string|max:255',
            'desc_categoria' => 'required|string|max:255',
        ]);

        Categorias::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito.');
    }

    public function edit(Categorias $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categorias $categoria)
    {
        $request->validate([
            'nom_categoria' => 'required|string|max:255',
            'desc_categoria' => 'required|string|max:255',
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada con éxito.');
    }

    public function destroy(Categorias $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada con éxito.');
    }
}
