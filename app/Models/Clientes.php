<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey = 'id_cliente';

    protected $fillable = ['id_usuario', 'id_tipo_cliente', 'saldo'];

    // Relación con usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Relación con tipos de clientes
    public function tipoCliente()
    {
        return $this->belongsTo(TiposClientes::class, 'id_tipo_cliente');
    }
}
