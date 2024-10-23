<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entradas;

class EntradasController extends Controller
{
    public function index()
    {

        $entradas = Entradas::all(); // Obtener todos los usuarios
        return view('admin.entradas.index', [ // Asegúrate de usar la notación de puntos
            'entradas' => $entradas  // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
    }
}
