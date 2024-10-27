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
        $usuarios = User::all();
        $puestos = Puestos::all();
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

        Empleados::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado creado con éxito.');
    }

    public function edit(Empleados $empleado)
    {
        $usuarios = User::all();
        $puestos = Puestos::all();
        return view('admin.empleados.edit', compact('empleado', 'usuarios', 'puestos'));
    }

    public function update(Request $request, Empleados $empleado)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'id_puesto' => 'required|exists:puestos,id_puesto',
            'fecha_contrato' => 'required|date',
            'salario' => 'required|numeric',
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado con éxito.');
    }

    public function destroy(Empleados $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado con éxito.');
    }
}
