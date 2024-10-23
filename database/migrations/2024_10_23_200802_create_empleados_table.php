<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado'); // ID del cliente
            $table->unsignedBigInteger('id_usuario'); // ID del usuario asociado
            $table->unsignedBigInteger('id_puesto'); // ID del tipo de cliente
            $table->date('fecha_contrato'); // Saldo del cliente
            $table->decimal('salario',8,2);

            $table->timestamps(); // Campos para created_at y updated_at

            // Claves foráneas
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_puesto')->references('id_puesto')->on('puestos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
