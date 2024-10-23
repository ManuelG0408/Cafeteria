<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposClientesTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_clientes', function (Blueprint $table) {
            $table->id('id_tipo_cliente'); // ID del cliente
            $table->string('desc_tipo_cliente'); // Descripción del tipo de cliente

            $table->timestamps();

           
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_clientes');
    }
}
