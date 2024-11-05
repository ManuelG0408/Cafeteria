<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado'); 
            $table->unsignedBigInteger('id_usuario'); 
            $table->unsignedBigInteger('id_puesto'); 
            $table->date('fecha_contrato'); 
            $table->decimal('salario',8,2);

            $table->timestamps(); 

            
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_puesto')->references('id_puesto')->on('puestos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
