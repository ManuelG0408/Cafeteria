<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TiposClientes; 

class TiposClientesController extends Controller
{
    public function index()
    {
        
        $tipos_clientes = TiposClientes::all();
        return view('admin.tipos_clientes.index',[
            'tipos_clientes' => $tipos_clientes
        ]);
    }

    
    public function create()
    {
        return view('admin.tipos_clientes.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'desc_tipo_cliente' => 'required|string|max:255',
        ]);

        TiposClientes::create($request->all());
        return redirect()->route('tipos_clientes.index')->with('success', 'Tipo de cliente creado con éxito');
    }

    
    public function edit($id)
    {
        $tipoCliente = TiposClientes::findOrFail($id);
        return view('admin.tipos_clientes.edit', compact('tipoCliente'));
    }

    
    public function update(Request $request, $id)
    {
        $tipoCliente = TiposClientes::findOrFail($id);

        $request->validate([
            'desc_tipo_cliente' => 'required|string|max:255',
        ]);

        $tipoCliente->update($request->all());
        return redirect()->route('tipos_clientes.index')->with('success', 'Tipo de cliente actualizado con éxito');
    }

    
    public function destroy($id)
    {
        $tipoCliente = TiposClientes::findOrFail($id);
        $tipoCliente->delete();
        return redirect()->route('tipos_clientes.index')->with('success', 'Tipo de cliente eliminado con éxito');
    }
}
