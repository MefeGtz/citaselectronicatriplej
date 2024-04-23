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
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('Id_cita');

            //aparato
            $table->unsignedBigInteger('Id_aparato');
            $table->foreign('Id_aparato')->references('Id_aparato')->on('aparato')->onDelete('cascade');

            //cliente
            $table->unsignedBigInteger('Id_cliente');
            $table->foreign('Id_cliente')->references('Id_cliente')->on('clientes')->onDelete('cascade');
            $table->string('Falla',250);
            $table->date('Fecha_creacion');
            $table->date('Fecha_cita')->nullable();
            $table->time('Hora_inicial');
            $table->time('Hora_final')->nullable();
            $table->string('Estado_cita',60);
            
            //usuarios .tecnicos y admins
            $table->unsignedBigInteger('Id_tecnico');
            $table->foreign('Id_tecnico')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('Id_usuario');
            $table->foreign('Id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->string('Observaciones',250)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
