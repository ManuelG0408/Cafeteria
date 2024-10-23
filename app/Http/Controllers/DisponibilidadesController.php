<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disponibilidades;
class DisponibilidadesController extends Controller
{
    public function index()
    {
        $disponibilidades = Disponibilidades::all();
        return view('admin.disponibilidades.index',[
            'disponibilidades' => $disponibilidades
        ]);
    }
}
