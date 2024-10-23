<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    public function index()
    {

        $clientes = Clientes::all(); // Obtener todos los usuarios
        return view('admin.clientes.index', [ // Asegúrate de usar la notación de puntos
            'clientes' => $clientes // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        $clientes = Clientes::all();
        return view('admin.clientes.index',[
            'clientes' => $clientes

        ]);
    }
}
