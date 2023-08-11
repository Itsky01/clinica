<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->id('est_id');
                      
            $table->unsignedBigInteger('profesionales_id'); // campo para llave foranea
            $table->unsignedBigInteger('usuarios_id'); // campo para llave foranea
            $table->unsignedBigInteger('tipoestudios_id'); // campo para llave foranea
             $table->unsignedBigInteger('fechas_id'); // campo para llave foranea
                 
            $table->time('hora');
            $table->string('mediopago',20);
            $table->foreign('profesionales_id')->references('prof_id')->on('profesionales')// especifico que llave foranea referencia a id de tabla especialidades
            ->onUpdate('cascade')// al modificar especialidad se modifica referencia en profesionales
            ->onDelete('cascade');

            $table->foreign('usuarios_id')->references('id')->on('users')
            ->onUpdate('cascade')// al modificar especialidad se modifica referencia en profesionales
            ->onDelete('cascade');
           
            $table->foreign('tipoestudios_id')->references('id')->on('tipo_estudios')
            ->onUpdate('cascade')// al modificar especialidad se modifica referencia en profesionales
            ->onDelete('cascade');
           
            $table->foreign('fechas_id')->references('f_id')->on('fechas')
            ->onUpdate('cascade')// al modificar especialidad se modifica referencia en profesionales
            ->onDelete('cascade');
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
        Schema::dropIfExists('estudios');
    }
}
