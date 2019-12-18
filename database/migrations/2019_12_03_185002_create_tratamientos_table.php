<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->dateTime('date_start');
            $table->dateTime('date_finish');
            $table->unsignedInteger('cita_id');



            $table->timestamps();

          //  $table->foreign('enfermedad_id')->references('id')->on('enfermedads');
          //  $table->foreign('medico_id')->references('id')->on('medicos');
          //  $table->foreign('paciente_id')->references('id')->on('pacientes');
           // $table->foreign('medicamento_id')->references('id')->on('medicamentos');
            $table->foreign('cita_id')->references('id')->on('citas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
}
