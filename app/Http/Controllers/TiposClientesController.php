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
}
