<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosPerecederos extends Model
{
    use HasFactory;

    protected $table = 'productos_perecederos';

    // Especificar la columna que actúa como clave primaria
    protected $primaryKey = 'id_productoperecedero'; // Asegúrate de que este nombre coincida con el de tu base de datos

    public $timestamps = false; // Si no estás utilizando timestamps

    protected $fillable = [
        'id_producto',
        'id_disponibilidad',
    ];

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto', 'id_producto');
    }

    public function disponibilidad()
    {
        return $this->belongsTo(Disponibilidades::class, 'id_disponibilidad', 'id_disponibilidad');
    }
}
