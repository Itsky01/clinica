<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('prof_apellido', 50);
            $table->string('prof_nombre', 50);
            $table->string('prof_dni', 20);
            $table->string('prof_email', 60);
            $table->string('prof_domicilio', 60);
            $table->string('prof_telefono', 50);
            $table->unsignedBigInteger('id_especialidad')->nullable(); // campo para llave foranea
            $table->foreign('id_especialidad')->references('id')->on('especialidades')// especifico que llave foranea referencia a id de tabla especialidades
            ->onUpdate('cascade')// al modificar especialidad se modifica referencia en profesionales
            ->onDelete('set null'); // si se borra especialidad referenciada se indica null en campo id_esp en profesionales 
            $table->string('prof_clave', 15);
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesionales');
    }
}
