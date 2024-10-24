<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extras extends Model
{
    use HasFactory;

    protected $table = 'extras';

    protected $primaryKey = 'id_extra';

    protected $fillable = ['desc_extra', 'precio_extra'];
}
