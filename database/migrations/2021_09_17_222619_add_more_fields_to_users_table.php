<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('DNI',20)->after('apellido');
            $table->string('telefono',35)->after('DNI');
            $table->string('domicilio',45)->after('telefono');
            $table->date('fecha')->after('domicilio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("DNI");
            $table->dropColumn("telefono");
            $table->dropColumn("domicilio");
            $table->dropColumn("fecha");
        });
    }
}
