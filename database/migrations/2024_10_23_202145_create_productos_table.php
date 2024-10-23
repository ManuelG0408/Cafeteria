<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto'); // ID del cliente
            $table->string('nom_producto')->unique();
            $table->string('desc_producto');
            $table->decimal('precio',8,2);
            $table->unsignedBigInteger('id_categoria'); // ID del usuario asociado
            $table->timestamps(); // Campos para created_at y updated_at

            // Claves foráneas
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
