<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory; // Permite el uso de fábricas para este modelo

    // Relación para obtener el usuario asociado al cliente
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id', 'id_cliente');
    }
}
