<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Extras;

class ExtrasController extends Controller
{
    public function index()
    {
        $extras = Extras::all();
        return view('admin.extras.index',[
            'extras' => $extras
        ]);
    }
}
