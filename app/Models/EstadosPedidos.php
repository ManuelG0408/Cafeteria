<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadosPedidos extends Model
{
    use HasFactory;

    protected $table = 'estados_pedidos';

    protected $primaryKey = 'id_estado_pedido';

    protected $fillable = ['desc_estado_pedido'];
}
