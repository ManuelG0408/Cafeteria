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

    // Método para almacenar un nuevo puesto
    public function store(Request $request)
    {
        $request->validate([
            'desc_puesto' => 'required|string|max:255',
        ]);

        Puestos::create([
            'desc_puesto' => $request->desc_puesto,
        ]);

        return redirect()->route('puestos.index')->with('success', 'Puesto creado con éxito');
    }
}
