<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    public function up()
    {
        //Schema::dropIfExists('pacientes'); //CAMBIADO
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('nuhsa');
            $table->unsignedInteger('enfermedad_id'); //CAMBIADO
            $table->unsignedInteger('especialidad_id');
            $table->timestamps();

            $table->foreign('enfermedad_id')->references('id')->on('enfermedads'); //CAMBIADO
            $table->foreign('especialidad_id')->references('id')->on('especialidads');
        });
    }

    public function down()
    {
        Schema::drop('pacientes');
    }
}
