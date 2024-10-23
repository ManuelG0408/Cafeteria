<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Model
{
    use Notifiable;

    // Define la tabla si el nombre no sigue la convención de pluralización
    protected $table = 'users';

    // Define los campos que son "fillable"
    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'email',
        'password',
    ];

    // Si deseas ocultar el password
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Puedes definir las relaciones si las tienes
}
