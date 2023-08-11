:<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesMutualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales_mutual', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('id_profesional'); // campo para llave foranea
            $table->unsignedBigInteger('id_mutual'); // campo para llave foranea
           
            $table->foreign('id_profesional')->references('id')->on('profesionales')// especifico que llave foranea referencia a id de tabla especialidades
            ->onUpdate('cascade')// al modificar especialidad se modifica referencia en profesionales
            ->onDelete('cascade');

            $table->foreign('id_mutual')->references('id')->on('mutuales')
            ->onUpdate('cascade')// al modificar especialidad se modifica referencia en profesionales
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesionales_mutual');
    }
}
