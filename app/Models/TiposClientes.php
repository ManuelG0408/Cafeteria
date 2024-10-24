<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposClientes extends Model
{
    use HasFactory;

    protected $table = 'tipos_clientes'; // Nombre de la tabla
    protected $primaryKey = 'id_tipo_cliente'; // Clave primaria

    protected $fillable = [
        'desc_tipo_cliente', // Campos que se pueden llenar
    ];
}
