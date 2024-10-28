<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallesPedidos extends Model
{
    use HasFactory;

    protected $table = 'detalles_pedidos';

    protected $fillable = [
        'id_pedido',
        'id_producto',
        'cantidad',
        'subtotal',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedidos::class, 'id_pedido', 'id_pedido');
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto', 'id_producto');
    }
}
