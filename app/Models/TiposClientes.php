<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposClientes extends Model
{
    use HasFactory;

    protected $table = 'tipos_clientes'; // Especificar la tabla si no sigue la convención de nombres

    protected $primaryKey = 'id_tipo_cliente'; // Especificar la clave primaria

    protected $fillable = ['desc_tipo_cliente']; // Campos que se pueden llenar
}
