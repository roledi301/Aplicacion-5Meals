<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEjercicioEntrenamientoTable extends Migration
{

    public function up()
    {
        Schema::create('ejercicio_entrenamiento', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('ejercicio_id');
            $table->foreign('ejercicio_id')->references('id')->on('ejercicios')->onDelete('cascade');

            $table->unsignedInteger('entrenamiento_id');
            $table->foreign('entrenamiento_id')->references('id')->on('entrenamientos')->onDelete('cascade');

            $table->longText('comentario')->nullable();
            $table->integer('repeticion');
            $table->enum('dia_semana',['lunes','martes','miercoles','jueves','viernes','sabado','domingo',]);

            $table->timestamps();
        });

    }


    public function down()
    {
        Schema::dropIfExists('ejercicio_entrenamiento');
    }
}
