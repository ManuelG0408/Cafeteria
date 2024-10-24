<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Nombre de la tabla
    protected $primaryKey = 'id_categoria'; // Clave primaria

    protected $fillable = [
        'nom_categoria',  // Campos que se pueden llenar
        'desc_categoria', // Campos que se pueden llenar
    ];
}
