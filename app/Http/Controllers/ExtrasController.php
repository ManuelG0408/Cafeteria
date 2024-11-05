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

   
    public function store(Request $request)
    {
        $request->validate([
            'desc_extra' => 'required|string|max:255',
            'precio_extra' => 'required|numeric|min:0',
        ]);

        Extras::create($request->all());
        return redirect()->route('extras.index')->with('success', 'Extra creado con éxito');
    }

    
    public function edit($id)
    {
        $extra = Extras::findOrFail($id);
        return view('admin.extras.edit', compact('extra'));
    }

    
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

    
    public function destroy($id)
    {
        $extra = Extras::findOrFail($id);
        $extra->delete();
        return redirect()->route('extras.index')->with('success', 'Extra eliminado con éxito');
    }
}
