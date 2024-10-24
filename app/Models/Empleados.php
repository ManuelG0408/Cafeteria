<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'id_usuario',
        'id_puesto',
        'fecha_contrato',
        'salario',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id'); // Relación con la tabla 'users'
    }

    public function puesto()
    {
        return $this->belongsTo(Puestos::class, 'id_puesto', 'id_puesto'); // Relación con la tabla 'puestos'
    }
}
