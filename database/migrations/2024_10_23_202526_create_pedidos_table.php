<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido'); // ID del cliente
            $table->date('fecha_pedido');
            $table->unsignedBigInteger('id_cliente'); // ID del usuario asociado
            $table->unsignedBigInteger('id_estado_pedido'); // ID del tipo de cliente
            $table->decimal('total');
            $table->string('comentarios');

            $table->timestamps(); // Campos para created_at y updated_at

            // Claves foráneas
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('id_estado_pedido')->references('id_estado_pedido')->on('estados_pedidos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
