<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('estados_pedidos', function (Blueprint $table) {
            $table->id('id_estado_pedido');
            $table->string('desc_estado_pedido');
           
            $table->timestamps();

           
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('estados_pedidos');
    }
};