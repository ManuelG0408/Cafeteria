<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosNoPerecederos extends Model
{
    use HasFactory;

    protected $table = 'productos_no_perecederos';

    protected $primaryKey = 'id_productonoperecedero';

    protected $fillable = ['id_producto', 'existencia', 'fecha_expiracion'];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto', 'id_producto');
    }
}
