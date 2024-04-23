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
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('Id_cliente');
            $table->string('Nombre');
            $table->string('Apellidos');
            $table->string('Genero');
            $table->string('Direccion')->nullable();
            $table->string('Telefono')->nullable();
            $table->timestamps();
           // $table->bigIncrements('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
