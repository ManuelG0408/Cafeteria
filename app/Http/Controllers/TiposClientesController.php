<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TiposClientes; // Asegúrate de usar el nombre correcto del modelo

class TiposClientesController extends Controller
{
    public function index()
    {
        // Usa TiposClientes en lugar de Tipos_Clientes
        $tipos_clientes = TiposClientes::all();
        return view('admin.tipos_clientes.index',[
            'tipos_clientes' => $tipos_clientes
        ]);
    }

    // Mostrar formulario para crear un nuevo tipo de cliente
    public function create()
    {
        return view('admin.tipos_clientes.create');
    }

    // Almacenar el nuevo tipo de cliente
    public function store(Request $request)
    {
        $request->validate([
            'desc_tipo_cliente' => 'required|string|max:255',
        ]);

        TiposClientes::create($request->all());
        return redirect()->route('tipos_clientes.index')->with('success', 'Tipo de cliente creado con éxito');
    }

    // Mostrar formulario para editar un tipo de cliente
    public function edit($id)
    {
        $tipoCliente = TiposClientes::findOrFail($id);
        return view('admin.tipos_clientes.edit', compact('tipoCliente'));
    }

    // Actualizar el tipo de cliente
    public function update(Request $request, $id)
    {
        $tipoCliente = TiposClientes::findOrFail($id);

        $request->validate([
            'desc_tipo_cliente' => 'required|string|max:255',
        ]);

        $tipoCliente->update($request->all());
        return redirect()->route('tipos_clientes.index')->with('success', 'Tipo de cliente actualizado con éxito');
    }

    // Eliminar un tipo de cliente
    public function destroy($id)
    {
        $tipoCliente = TiposClientes::findOrFail($id);
        $tipoCliente->delete();
        return redirect()->route('tipos_clientes.index')->with('success', 'Tipo de cliente eliminado con éxito');
    }
}
