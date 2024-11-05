<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidades extends Model
{
    use HasFactory;

    protected $table = 'disponibilidades';
    protected $primaryKey = 'id_disponibilidad'; 

    protected $fillable = [
        'desc_disponibilidad', 
    ];
}
