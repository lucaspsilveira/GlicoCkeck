<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioPressaoArterialRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_pressao_arterial_registros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_usuario');
            $table->integer('pressao_arterial_sistolica');
            $table->integer('pressao_arterial_diastolica');
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
        Schema::dropIfExists('usuario_pressao_arterial_registros');
    }
}
