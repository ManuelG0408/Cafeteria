<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $primaryKey = 'id_producto';

    protected $fillable = ['nom_producto', 'desc_producto', 'precio', 'id_categoria', 'imagen'];

 
    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria');
    }

    
}
