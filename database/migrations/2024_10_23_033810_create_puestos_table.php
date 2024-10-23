<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->id('id_puesto');
            $table->string('desc_puesto'); 

            $table->timestamps();

           
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('puestos');
    }
};
