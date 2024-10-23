<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 21dec96d689ccdf10259dfe01d956d2d4a6ee4fa
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
<<<<<<< HEAD
    protected $table = 'clientes'; // Asegúrate de que coincida con el nombre de tu tabla en la base de datos
=======
    use HasFactory; // Permite el uso de fábricas para este modelo

    // Relación para obtener el usuario asociado al cliente
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id', 'id_cliente');
    }
>>>>>>> 21dec96d689ccdf10259dfe01d956d2d4a6ee4fa
}
