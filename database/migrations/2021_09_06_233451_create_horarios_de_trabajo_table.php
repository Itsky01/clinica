<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosDeTrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_de_trabajo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_profesional'); // campo para llave foranea
            $table->string('tipo_turno',20);
          
           $table->unsignedBigInteger('dia_atencion'); 
           $table->time('hora_atencion');

            $table->foreign('id_profesional')->references('id')->on('profesionales')// especifico que llave foranea referencia a id de tabla especialidades
            ->onUpdate('cascade')// al modificar especialidad se modifica referencia en profesionales
            ->onDelete('cascade');

            $table->foreign('dia_atencion')->references('id')->on('dias')
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
        Schema::dropIfExists('horarios_de_trabajo');
    }
}
