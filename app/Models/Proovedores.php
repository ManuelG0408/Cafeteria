<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proovedores extends Model
{
    use HasFactory;

    protected $table = 'proovedores';

    protected $primaryKey = 'id_proovedor';

    protected $fillable = ['id_usuario', 'empresa', 'rfc'];

    // Definición de la relación con el modelo User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
