<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('extras', function (Blueprint $table) {
            $table->id('id_extra');
            $table->string('desc_extra');
            $table->decimal('precio_extra', 8, 2); // Precio del extra (con 8 dígitos en total y 2 después del punto decimal)

            $table->timestamps();

           
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('extras');
    }
};
