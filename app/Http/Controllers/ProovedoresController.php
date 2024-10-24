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

    public function create()
    {
        $usuarios = User::all(); // Obtener todos los usuarios para el formulario
        return view('admin.proovedores.create', compact('usuarios'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_usuario' => 'required|exists:users,id', // Validar que el ID del usuario exista
        'empresa' => 'required|string|max:255', // Campo obligatorio
        'rfc' => 'required|string|max:13|unique:proovedores,rfc', // RFC debe ser único y obligatorio
    ]);

    Proovedores::create([
        'id_usuario' => $request->id_usuario,
        'empresa' => $request->empresa,
        'rfc' => $request->rfc,
    ]);

    return redirect()->route('proovedores.index')->with('message', 'Proveedor creado con éxito.');
}

}
