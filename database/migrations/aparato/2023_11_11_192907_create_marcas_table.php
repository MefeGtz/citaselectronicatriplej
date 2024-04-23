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
        Schema::create('marcas', function (Blueprint $table) {
         //  $table->engine = 'InnoDB';
            $table->bigIncrements('Id_marca');
            $table->string('Marca', 80);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //->nullable()
        Schema::dropIfExists('marcas');
    }
};
