<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewidestudioToEstudios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudios', function (Blueprint $table) {
            $table->renameColumn('id_usuario', 'usuarios_id');
            $table->renameColumn('id_profesional', 'profesionales_id');
            $table->renameColumn('id_tipoestudio', 'tipoestudios_id');
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudios', function (Blueprint $table) {
            $table->dropColumn("fecha");
        });
    }
}
