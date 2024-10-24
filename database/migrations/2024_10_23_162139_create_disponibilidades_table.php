<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('disponibilidades', function (Blueprint $table) {
            $table->id('id_disponibilidad');
            $table->string('desc_disponibilidad');
           
            $table->timestamps();

           
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('disponibilidades');
    }
};
