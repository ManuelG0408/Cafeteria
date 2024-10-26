<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proovedores;
use App\Models\User;

class ProovedoresController extends Controller
{
    public function index()
    {

        $proovedores = Proovedores::all(); // Obtener todos los usuarios
        return view('admin.proovedores.index', [ // Asegúrate de usar la notación de puntos
            'proovedores' => $proovedores // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
    }

    // Mostrar formulario para crear un nuevo proveedor
    public function create()
    {
        $usuarios = User::all(); // Obtener todos los usuarios
        return view('admin.proovedores.create', compact('usuarios'));
    }


    // Almacenar el nuevo proveedor
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'empresa' => 'required|string|max:255',
            'rfc' => 'required|string|max:255|unique:proovedores',
        ]);

        Proovedores::create($request->all());
        return redirect()->route('proovedores.index')->with('success', 'Proveedor creado con éxito');
    }

    // Mostrar formulario para editar un proveedor
        public function edit($id)
    {
        $proovedor = Proovedores::findOrFail($id);
        $usuarios = User::all(); // Obtener todos los usuarios
        return view('admin.proovedores.edit', compact('proovedor', 'usuarios'));
    }


    // Actualizar el proveedor
    public function update(Request $request, $id)
    {
        $proovedor = Proovedores::findOrFail($id);

        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'empresa' => 'required|string|max:255',
            'rfc' => 'required|string|max:255|unique:proovedores,rfc,' . $proovedor->id_proovedor . ',id_proovedor',
        ]);

        $proovedor->update($request->all());
        return redirect()->route('proovedores.index')->with('success', 'Proveedor actualizado con éxito');
    }

    // Eliminar un proveedor
    public function destroy($id)
    {
        $proovedor = Proovedores::findOrFail($id);
        $proovedor->delete();
        return redirect()->route('proovedores.index')->with('success', 'Proveedor eliminado con éxito');
    }

}
