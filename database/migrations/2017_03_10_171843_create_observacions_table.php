<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacions', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');

            /*Datos de estado del Paciente */
            $table->double('peso');
            $table->double('masaGrasa')->nullable();

            /*Medidas antropometricas*/
            $table->double('brazo')->nullable();
            $table->double('muñeca')->nullable();
            $table->double('cintura')->nullable();
            $table->double('cadera')->nullable();
            $table->double('plieguesAbdominales')->nullable();
            $table->double('muslo')->nullable();
            $table->double('gemelarMedio')->nullable();

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
        Schema::dropIfExists('observacions');
    }
}
