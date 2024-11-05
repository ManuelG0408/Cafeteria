<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puestos;

class PuestosController extends Controller
{
    public function index()
    {
        $puestos = Puestos::all();
        return view('admin.puestos.index',[
            'puestos' => $puestos
        ]);
    }
    
    
    public function create()
    {
        return view('admin.puestos.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'desc_puesto' => 'required|string|max:255',
        ]);

        Puestos::create($request->all());
        return redirect()->route('puestos.index')->with('success', 'Puesto creado con éxito');
    }

    
    public function edit($id)
    {
        $puesto = Puestos::findOrFail($id);
        return view('admin.puestos.edit', compact('puesto'));
    }

    
    public function update(Request $request, $id)
    {
        $puesto = Puestos::findOrFail($id);

        $request->validate([
            'desc_puesto' => 'required|string|max:255',
        ]);

        $puesto->update($request->all());
        return redirect()->route('puestos.index')->with('success', 'Puesto actualizado con éxito');
    }

    
    public function destroy($id)
    {
        $puesto = Puestos::findOrFail($id);
        $puesto->delete();
        return redirect()->route('puestos.index')->with('success', 'Puesto eliminado con éxito');
    }
}
