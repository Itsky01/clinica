<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_consultas', function (Blueprint $table) {
            $table->id();
            $table->string('paciente',60);
            $table->string('profesional',50);
$table->date('fecha');
$table->time('hora');
$table->string('mediopago',20);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_consultas');
    }
}
