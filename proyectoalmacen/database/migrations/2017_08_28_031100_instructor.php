<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Instructor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor', function(Blueprint $table){
            $table->increments('id');
            $table->string('documento');
            $table->integer('programa_id')->unsigned();
            $table->foreign('programa_id')->references('id')->on('programa');
            $table->integer('horario_id')->unsigned();
            $table->foreign('horario_id')->references('id')->on('horario');
            $table->integer('ambiente_id')->unsigned();
            $table->foreign('ambiente_id')->references('id')->on('ambiente_formacion');
            // $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');
            $table->string('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instructor');
    }
}
