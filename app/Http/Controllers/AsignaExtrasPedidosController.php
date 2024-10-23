<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsignaExtrasPedidos;

class AsignaExtrasPedidosController extends Controller
{
    public function index()
    {
        $asigna_extras_pedidos = AsignaExtrasPedidos::all();
        return view('admin.asignaextraspedidos.index',[
            'asigna_extras_pedidos' => $asigna_extras_pedidos
        ]);
    }
}
