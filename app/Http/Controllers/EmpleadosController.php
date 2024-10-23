<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleados::all();
        return view('admin.empleados.index',[
            'empleados' => $empleados
        ]);
    }
}
