<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('aparato', function (Blueprint $table) {
            //$table->engine="InnoDB";
             $table->bigIncrements('Id_aparato');
             $table->unsignedBigInteger('Id_tipoaparato');
             $table->foreign('Id_tipoaparato')->references('Id_tipoaparato')->on('tipoaparato')->onDelete('cascade');
             $table->unsignedBigInteger('Id_marca');
             $table->foreign('Id_marca')->references('Id_marca')->on('marcas')->onDelete('cascade');
           // $table->bigInteger('Id_tipoaparato')->unsigned();
            // $table->bigInteger('Id_marca')->unsigned();
             $table->string('Modelo', 80);
             $table->string('Descripcion')->nullable();
             $table->timestamps();
            
             
         });

         
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('aparato');
    }
};
