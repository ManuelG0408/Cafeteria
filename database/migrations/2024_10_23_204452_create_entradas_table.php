<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id('id_entrada'); 
            $table->unsignedBigInteger('id_proovedor'); 
            $table->unsignedBigInteger('id_producto'); 
            $table->integer('cantidad');
            $table->decimal('precio_compra',8,2);
            $table->date('fecha_entrada');

            $table->timestamps(); 

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
