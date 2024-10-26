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
    
    // Mostrar formulario para crear un nuevo extra
    public function create()
    {
        return view('admin.extras.create');
    }

    // Almacenar el nuevo extra
    public function store(Request $request)
    {
        $request->validate([
            'desc_extra' => 'required|string|max:255',
            'precio_extra' => 'required|numeric|min:0',
        ]);

        Extras::create($request->all());
        return redirect()->route('extras.index')->with('success', 'Extra creado con éxito');
    }

    // Mostrar formulario para editar un extra
    public function edit($id)
    {
        $extra = Extras::findOrFail($id);
        return view('admin.extras.edit', compact('extra'));
    }

    // Actualizar el extra
    public function update(Request $request, $id)
    {
        $extra = Extras::findOrFail($id);

        $request->validate([
            'desc_extra' => 'required|string|max:255',
            'precio_extra' => 'required|numeric|min:0',
        ]);

        $extra->update($request->all());
        return redirect()->route('extras.index')->with('success', 'Extra actualizado con éxito');
    }

    // Eliminar un extra
    public function destroy($id)
    {
        $extra = Extras::findOrFail($id);
        $extra->delete();
        return redirect()->route('extras.index')->with('success', 'Extra eliminado con éxito');
    }
}
