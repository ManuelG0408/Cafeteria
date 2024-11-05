<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entradas;
use App\Models\Proovedores;
use App\Models\Productos;

class EntradasController extends Controller
{
    public function index()
    {

        $entradas = Entradas::all(); 
        return view('admin.entradas.index', [ 
            'entradas' => $entradas  

        ]);
    }

    public function create()
    {
        $proovedores = Proovedores::all();
        $productos = Productos::all();
        return view('admin.entradas.create', compact('proovedores', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_proovedor' => 'required|exists:proovedores,id_proovedor',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1',
            'precio_compra' => 'required|numeric|min:0',
            'fecha_entrada' => 'required|date',
        ]);

        Entradas::create($request->all());

        return redirect()->route('entradas.index')->with('message', 'Entrada creada exitosamente.');
    }

    public function edit(Entradas $entrada)
    {
        $proveedores = Proovedores::all();
        $productos = Productos::all();
        return view('entradas.edit', compact('entrada', 'proovedores', 'productos'));
    }

    public function update(Request $request, Entradas $entrada)
    {
        $request->validate([
            'id_proovedor' => 'required|exists:proovedores,id_proovedor',
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1',
            'precio_compra' => 'required|numeric|min:0',
            'fecha_entrada' => 'required|date',
        ]);

        $entrada->update($request->all());

        return redirect()->route('entradas.index')->with('message', 'Entrada actualizada exitosamente.');
    }

    public function destroy(Entradas $entrada)
    {
        $entrada->delete();
        return redirect()->route('entradas.index')->with('message', 'Entrada eliminada exitosamente.');
    }
}
