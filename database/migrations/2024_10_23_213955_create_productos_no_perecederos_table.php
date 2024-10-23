<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('productos_no_perecederos', function (Blueprint $table) {
            $table->id('id_productonoperecedero');
            $table->unsignedBigInteger('id_producto'); 
            $table->integer('existencia');
            $table->date('fecha_expiracion');
            $table->timestamps(); // Campos para created_at y updated_at

            // Claves foráneas
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos_no_perecederos');
    }
};
