<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('productos', function (Blueprint $table) {
        $table->id('id_producto'); // ID del producto
        $table->string('nom_producto')->unique();
        $table->string('desc_producto');
        $table->decimal('precio', 8, 2);
        $table->unsignedBigInteger('id_categoria'); // Relación con categoría
        $table->string('imagen')->nullable(); // Columna para la imagen del producto
        $table->timestamps();

        // Clave foránea
        $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('productos');
}

};
