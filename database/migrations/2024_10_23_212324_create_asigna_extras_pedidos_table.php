<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asigna_extras_pedidos', function (Blueprint $table) {
            $table->id('id_asigna_extra_pedido'); // ID del cliente
            $table->unsignedBigInteger('id_pedido'); 
            $table->unsignedBigInteger('id_extra'); // ID del usuario asociado
           
            $table->timestamps(); // Campos para created_at y updated_at

            // Claves foráneas
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
            $table->foreign('id_extra')->references('id_extra')->on('extras')->onDelete('cascade');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('asigna_extras_pedidos');
    }
};
