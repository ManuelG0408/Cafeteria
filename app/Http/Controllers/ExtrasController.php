<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extras;

class ExtrasController extends Controller
{
    public function index()
    {
        $extras = Extras::all();
        return view('admin.extras.index',[
            'extras' => $extras
        ]);
    }
    public function create()
    {
        return view('admin.extras.create');
    }

    // Método para almacenar un nuevo extra
    public function store(Request $request)
    {
        $request->validate([
            'desc_extra' => 'required|string|max:255',
            'precio_extra' => 'required|numeric|min:0',
        ]);

        Extras::create([
            'desc_extra' => $request->desc_extra,
            'precio_extra' => $request->precio_extra,
        ]);

        return redirect()->route('extras.index')->with('success', 'Extra creado con éxito');
    }
}
