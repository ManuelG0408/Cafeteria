<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detalles_pedidos', function (Blueprint $table) {
            $table->id('id_detalle_pedido'); 
            $table->unsignedBigInteger('id_pedido'); 
            $table->unsignedBigInteger('id_producto'); 
            $table->integer('cantidad');
            $table->decimal('subtotal',8,2);
            $table->timestamps(); 

            // Claves foráneas
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalles_pedidos');
    }
};
