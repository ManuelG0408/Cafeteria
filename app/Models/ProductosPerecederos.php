<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosPerecederos extends Model
{
    use HasFactory;

    protected $table = 'productos_perecederos';
    protected $primaryKey = 'id_productoperecedero'; // Definir la clave primaria

    protected $fillable = [
        'id_producto',
        'id_disponibilidad',
    ];

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }

    public function disponibilidad()
    {
        return $this->belongsTo(Disponibilidades::class, 'id_disponibilidad');
    }
}
