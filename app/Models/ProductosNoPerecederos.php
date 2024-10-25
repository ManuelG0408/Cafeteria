<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosNoPerecederos extends Model
{
    use HasFactory;

    protected $table = 'productos_no_perecederos'; // Nombre de la tabla

    protected $primaryKey = 'id_productonoperecedero'; // Clave primaria

    protected $fillable = [
        'id_producto',
        'existencia',
        'fecha_expiracion',
    ];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto', 'id_producto');
    }
}
