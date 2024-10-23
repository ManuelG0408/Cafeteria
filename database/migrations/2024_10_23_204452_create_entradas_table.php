<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id('id_entrada'); // ID del cliente
            $table->unsignedBigInteger('id_proovedor'); // ID del usuario asociado
            $table->unsignedBigInteger('id_producto'); // ID del tipo de cliente
            $table->integer('cantidad');
            $table->decimal('precio_compra',8,2);
            $table->date('fecha_entrada');

            $table->timestamps(); // Campos para created_at y updated_at

            // Claves foráneas
            $table->foreign('id_proovedor')->references('id_proovedor')->on('proovedores')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('entradas');
    }
};
