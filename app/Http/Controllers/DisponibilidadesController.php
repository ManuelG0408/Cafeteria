<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disponibilidades;
class DisponibilidadesController extends Controller
{
    public function index()
    {
        $disponibilidades = Disponibilidades::all();
        return view('admin.disponibilidades.index',[
            'disponibilidades' => $disponibilidades
        ]);
    }

    public function create()
    {
        return view('admin.disponibilidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'desc_disponibilidad' => 'required|string|max:255',
        ]);

        Disponibilidades::create($request->all());
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad creada con éxito.');
    }

    public function edit(Disponibilidades $disponibilidad)
    {
        return view('disponibilidades.edit', compact('disponibilidad'));
    }

    public function update(Request $request, Disponibilidades $disponibilidad)
    {
        $request->validate([
            'desc_disponibilidad' => 'required|string|max:255',
        ]);

        $disponibilidad->update($request->all());
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad actualizada con éxito.');
    }

    public function destroy(Disponibilidades $disponibilidad)
    {
        $disponibilidad->delete();
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad eliminada con éxito.');
    }
}
