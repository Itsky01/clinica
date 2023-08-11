<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            
           
            $table->unsignedBigInteger('id_profesional'); // campo para llave foranea
            $table->unsignedBigInteger('id_usuario'); // campo para llave foranea
            $table->date('fecha');
            $table->time('hora');
            $table->string('mediopago',20);
            $table->foreign('id_profesional')->references('id')->on('profesionales')// especifico que llave foranea referencia a id de tabla especialidades
            ->onUpdate('cascade')// al modificar especialidad se modifica referencia en profesionales
            ->onDelete('cascade');

            $table->foreign('id_usuario')->references('id')->on('users')
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
        Schema::dropIfExists('consultas');
    }
}
