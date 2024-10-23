<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proovedores;

class ProovedoresController extends Controller
{
    public function index()
    {

        $proovedores = Proovedores::all(); // Obtener todos los usuarios
        return view('admin.proovedores.index', [ // Asegúrate de usar la notación de puntos
            'proovedores' => $proovedores // Cambié 'personas' a 'usuarios' para reflejar mejor el contenido

        ]);
    }
}
