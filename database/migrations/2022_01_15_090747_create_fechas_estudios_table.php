<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFechasEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechas_estudios', function (Blueprint $table) {
            $table->id();
            $table->date('est_fecha');
            $table->unsignedBigInteger('id_profesional'); // campo para llave foranea
            $table->unsignedBigInteger('dias_id'); // campo para llave foranea
           
            $table->foreign('id_profesional')->references('prof_id')->on('profesionales')// especifico que llave foranea referencia a id de tabla especialidades
            ->onUpdate('cascade')// al modificar especialidad se modifica referencia en profesionales
            ->onDelete('cascade');

            $table->foreign('dias_id')->references('d_id')->on('dias')
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
        Schema::dropIfExists('fechas_estudios');
    }
}
