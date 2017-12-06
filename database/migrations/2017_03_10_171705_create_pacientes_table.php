<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->enum('sexo',['hombre','mujer']);
            $table->integer('nhc')->nullable();
            $table->double('altura');
            $table->enum('actividad_fisica',['ligera','moderada','elevada']);
            $table->longText('patologias')->nullable();
           $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
