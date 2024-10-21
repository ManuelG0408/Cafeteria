<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    // Mostrar una lista de usuarios
    public function index()
    {
        $usuarios = Usuarios::all(); // Obtener todos los usuarios
        return view('admin.usuarios.index', [ // Asegúrate de usar la notación de puntos
            'usuarios' => $usuarios // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido
        ]);
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users', // Asegúrate que la tabla se llame 'users'
            'password' => 'required|string|min:8',
        ]);

        // Crear el usuario
        $usuario = Usuarios::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encriptar la contraseña
        ]);

        return response()->json($usuario, 201); // Retornar el usuario creado con un código 201
    }

    // Mostrar un usuario específico
    public function show($id)
    {
        $usuario = Usuarios::findOrFail($id); // Encontrar el usuario o lanzar una excepción
        return response()->json($usuario); // Retornar como JSON
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'apellido_paterno' => 'sometimes|required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'telefono' => 'sometimes|required|string|max:15',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id, // Excluyendo el propio ID
            'password' => 'sometimes|nullable|string|min:8',
        ]);

        $usuario = Usuarios::findOrFail($id); // Encontrar el usuario
        $usuario->update($request->all()); // Actualizar los campos del usuario

        // Actualizar la contraseña si se proporciona
        if ($request->password) {
            $usuario->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return response()->json($usuario); // Retornar el usuario actualizado
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuarios::findOrFail($id); // Encontrar el usuario
        $usuario->delete(); // Eliminar el usuario

        return response()->json(null, 204); // Retornar una respuesta vacía con código 204
    }
}
