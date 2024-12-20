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
        $entradas = Entradas::with(['proveedores.usuario', 'producto'])->get(); 

<<<<<<< HEAD
        $entradas = Entradas::all(); 
        return view('admin.entradas.index', [ 
            'entradas' => $entradas  

=======
        return view('admin.entradas.index', [
            'entradas' => $entradas
>>>>>>> 6184523d737de267b9cba7572dbcae80158a983a
        ]);
    }

    public function create()
    {
        $proovedores = Proovedores::all();
        $productos = Productos::all();
        $proovedores = Proovedores::all();
        return view('admin.entradas.create', compact('proovedores', 'productos','proovedores'));
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
        $proovedores = Proovedores::all();
        $productos = Productos::all();
        return view('admin.entradas.edit', compact('entrada', 'proovedores', 'productos'));
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
