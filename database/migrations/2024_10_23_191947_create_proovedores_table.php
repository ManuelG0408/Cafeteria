<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proovedores', function (Blueprint $table) {
            $table->id('id_proovedor'); 
            $table->unsignedBigInteger('id_usuario'); 
            $table->string('empresa');
            $table->string('rfc')->unique();
            
            $table->timestamps(); 

            
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
    
        });
    }

    public function down()
    {
        Schema::dropIfExists('proovedores');
    }
};
