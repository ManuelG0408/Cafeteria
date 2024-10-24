<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Models\Puestos;
use App\Models\User;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleados::all();
        return view('admin.empleados.index', [
            'empleados' => $empleados
        ]);
    }

    public function create()
    {
        $usuarios = User::all(); // Obtener todos los usuarios para el formulario
        $puestos = Puestos::all(); // Obtener todos los puestos para el formulario
        return view('admin.empleados.create', compact('usuarios', 'puestos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'id_puesto' => 'required|exists:puestos,id_puesto',
            'fecha_contrato' => 'required|date',
            'salario' => 'required|numeric',
        ]);

        Empleados::create([
            'id_usuario' => $request->id_usuario, 
            'id_puesto' => $request->id_puesto,
            'fecha_contrato' => $request->fecha_contrato,
            'salario' => $request->salario,
        ]);

        return redirect()->route('empleados.index')->with('message', 'Empleado creado con éxito.');
    }
}
