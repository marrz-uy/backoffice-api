<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntosinteres', function (Blueprint $table) {
            $table->id();
            $table->String('Nombre');
            $table->String('Departamento')->nullable();
            $table->String('Ciudad')->nullable();
            $table->String('Direccion')->nullable();
            $table->JSON('Contacto')->nullable();
            $table->JSON('Horario')->nullable();
            $table->String('Descripcion')->nullable();
            $table->String('Imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntos_interes');
    }
};
