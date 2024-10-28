<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Empleados extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'empleados';

    protected $primaryKey = 'id_empleado';

    protected $fillable = [
        'id_usuario',
        'id_puesto',
        'fecha_contrato',
        'salario',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function puesto()
    {
        return $this->belongsTo(Puestos::class, 'id_puesto');
    }
}
