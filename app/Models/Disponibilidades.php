<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidades extends Model
{
    use HasFactory;

    protected $table = 'disponibilidades'; // Nombre de la tabla
    protected $primaryKey = 'id_disponibilidad'; // Clave primaria

    protected $fillable = [
        'desc_disponibilidad', // Campos que se pueden llenar
    ];
}
