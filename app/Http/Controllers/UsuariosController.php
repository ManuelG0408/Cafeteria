<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    
    public function index()
    {
        $usuarios = Usuarios::all(); 
        return view('admin.usuarios.index', [ 
            'usuarios' => $usuarios 
        ]);
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:8',
        ]);

        
        $usuario = Usuarios::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        return response()->json($usuario, 201); 
    }

    
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'apellido_paterno' => 'sometimes|required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'telefono' => 'sometimes|required|string|max:15',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id, 
            'password' => 'sometimes|nullable|string|min:8',
        ]);

        $usuario = Usuarios::findOrFail($id); 
        $usuario->update($request->all()); 

        
        if ($request->password) {
            $usuario->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return response()->json($usuario); 
    }

    public function destroy($id)
    {
        $usuarios = Usuarios::find($id);
    
        if ($usuarios) {
            $usuarios->delete();
            return redirect()->route('usuarios.index')->with('message', 'Usuario eliminado con éxito.');
        } else {
            return redirect()->route('usuarios.index')->with('message', 'Usuario no encontrado.');
        }
    }
    
}
