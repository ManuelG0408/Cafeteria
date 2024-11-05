<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido'); 
            $table->date('fecha_pedido');
            $table->unsignedBigInteger('id_cliente'); 
            $table->unsignedBigInteger('id_estado_pedido'); 
            $table->decimal('total');
            $table->string('comentarios');

            $table->timestamps(); 

            
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_estado_pedido')->references('id_estado_pedido')->on('estados_pedidos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
