<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puestos extends Model
{
    use HasFactory;

    protected $table = 'puestos';

    protected $primaryKey = 'id_puesto';

    protected $fillable = ['desc_puesto'];
}
