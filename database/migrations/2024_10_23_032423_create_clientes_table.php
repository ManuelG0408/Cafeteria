<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id_cliente'); // ID del cliente
            $table->unsignedBigInteger('id_usuario'); // ID del usuario asociado
            $table->unsignedBigInteger('id_tipo_cliente'); // ID del tipo de cliente
            $table->decimal('saldo', 10, 2); // Saldo del cliente

            $table->timestamps(); // Campos para created_at y updated_at

            // Claves foráneas
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tipo_cliente')->references('id_tipo_cliente')->on('tipos_clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
