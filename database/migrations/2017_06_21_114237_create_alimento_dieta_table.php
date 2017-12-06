<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlimentoDietaTable extends Migration
{
    public function up()
    {
        Schema::create('alimento_dieta', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('alimento_id');
            $table->foreign('alimento_id')->references('id')->on('alimentos')->onDelete('cascade');

            $table->unsignedInteger('dieta_id');
            $table->foreign('dieta_id')->references('id')->on('dietas')->onDelete('cascade');

            $table->enum('dia_semana',['lunes','martes','miercoles','jueves','viernes','sabado','domingo',]);
            $table->enum('momento',['desayuno','mediaMañana','almuerzo','merienda','cena']);
            $table->longText('comentario')->nullable();
            $table->double('cantidad');


            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('alimento_dieta');
    }
}
