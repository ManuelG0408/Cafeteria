<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedidos'; // Nombre de la tabla

    protected $primaryKey = 'id_pedido'; // Clave primaria

    protected $fillable = [
        'fecha_pedido',
        'id_cliente',
        'id_estado_pedido',
        'total',
        'comentarios',
    ];

    // Relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'id_cliente', 'id_cliente');
    }

    // Relación con el modelo EstadoPedido
    public function estadoPedido()
    {
        return $this->belongsTo(EstadosPedidos::class, 'id_estado_pedido', 'id_estado_pedido');
    }
}
