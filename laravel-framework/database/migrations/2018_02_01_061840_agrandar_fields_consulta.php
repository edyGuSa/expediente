<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgrandarFieldsConsulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historico_consulta', function (Blueprint $table) {
            $table->string('notas_medicas',5000)->nullable()->change();
            $table->string('medicación',5000)->nullable()->change();
            $table->string('diagnostico',5000)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historico_consulta', function (Blueprint $table) {
            $table->string('notas_medicas')->change();
            $table->string('medicación')->change();
            $table->string('diagnostico')->change();
        });
    }
}
