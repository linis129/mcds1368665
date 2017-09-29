<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Horario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario', function(Blueprint $table){
            $table->increments('id');
            $table->string('codigo');
            $table->string('hora_inicial');
            $table->string('hora_final');
            $table->string('fecha_inicial');
            $table->string('fecha_final');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('horario');
    }
}
