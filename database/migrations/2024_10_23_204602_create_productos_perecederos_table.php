<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('productos_perecederos', function (Blueprint $table) {
            $table->id('id_productoperecedero'); 
            $table->unsignedBigInteger('id_producto'); 
            $table->unsignedBigInteger('id_disponibilidad'); 
            $table->timestamps(); 

            
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_disponibilidad')->references('id_disponibilidad')->on('disponibilidades')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos_perecederos');
    }
};
