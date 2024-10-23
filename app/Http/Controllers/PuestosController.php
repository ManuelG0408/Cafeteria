<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puestos;

class PuestosController extends Controller
{
    public function index()
    {
        $puestos = Puestos::all();
        return view('admin.puestos.index',[
            'puestos' => $puestos
        ]);
    }
}
