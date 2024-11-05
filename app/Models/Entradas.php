<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    use HasFactory;

    protected $table = 'entradas';

    protected $primaryKey = 'id_entrada';

    protected $fillable = [
        'id_proovedor',
        'id_producto',
        'cantidad',
        'precio_compra',
        'fecha_entrada',
    ];

    // Relaciones
    public function proveedores()
    {
        return $this->belongsTo(Proovedores::class, 'id_proovedor');
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto');
    }
}
