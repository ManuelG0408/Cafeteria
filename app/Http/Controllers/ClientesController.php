<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\User;
use App\Models\TiposClientes;

class ClientesController extends Controller
{
    public function index()
    {

        $clientes = Clientes::all(); // Obtener todos los usuarios
        return view('admin.clientes.index', [ // Asegúrate de usar la notación de puntos
            'clientes' => $clientes // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
    }

    // Mostrar formulario de creación
    public function create()
    {
        $usuarios = User::all();
        $tiposClientes = TiposClientes::all();
        return view('admin.clientes.create', compact('usuarios', 'tiposClientes'));
    }

    // Almacenar un nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'id_tipo_cliente' => 'required|exists:tipos_clientes,id_tipo_cliente',
            'saldo' => 'required|numeric|min:0',
        ]);

        Clientes::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        $usuarios = User::all();
        $tiposClientes = TiposClientes::all();
        return view('admin.clientes.edit', compact('cliente', 'usuarios', 'tiposClientes'));
    }

    // Actualizar un cliente
    public function update(Request $request, $id)
    {
        $cliente = Clientes::findOrFail($id);

        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'id_tipo_cliente' => 'required|exists:tipos_clientes,id_tipo_cliente',
            'saldo' => 'required|numeric|min:0',
        ]);

        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado con éxito');
    }

    // Eliminar un cliente
    public function destroy($id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito');
    }
}
