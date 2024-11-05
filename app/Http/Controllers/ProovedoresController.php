<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proovedores;
use App\Models\User;

class ProovedoresController extends Controller
{
    public function index()
    {

        $proovedores = Proovedores::all(); 
        return view('admin.proovedores.index', [ 
            'proovedores' => $proovedores

        ]);
    }

    
    public function create()
    {
        $usuarios = User::all(); 
        return view('admin.proovedores.create', compact('usuarios'));
    }


    
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'empresa' => 'required|string|max:255',
            'rfc' => 'required|string|max:255|unique:proovedores',
        ]);

        Proovedores::create($request->all());
        return redirect()->route('proovedores.index')->with('success', 'Proveedor creado con éxito');
    }

    
        public function edit($id)
    {
        $proovedor = Proovedores::findOrFail($id);
        $usuarios = User::all(); 
        return view('admin.proovedores.edit', compact('proovedor', 'usuarios'));
    }


    
    public function update(Request $request, $id)
    {
        $proovedor = Proovedores::findOrFail($id);

        $request->validate([
            'id_usuario' => 'required|exists:users,id',
            'empresa' => 'required|string|max:255',
            'rfc' => 'required|string|max:255|unique:proovedores,rfc,' . $proovedor->id_proovedor . ',id_proovedor',
        ]);

        $proovedor->update($request->all());
        return redirect()->route('proovedores.index')->with('success', 'Proveedor actualizado con éxito');
    }

    
    public function destroy($id)
    {
        $proovedor = Proovedores::findOrFail($id);
        $proovedor->delete();
        return redirect()->route('proovedores.index')->with('success', 'Proveedor eliminado con éxito');
    }

}
