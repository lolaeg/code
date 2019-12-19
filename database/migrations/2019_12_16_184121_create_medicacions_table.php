<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('unidadesmed');
            $table->string('frecuenciamed');
            $table->string('instrucciones');
            $table->unsignedInteger('tratamiento_id');
            $table->unsignedInteger('medicamento_id');


            $table->foreign('tratamiento_id')->references('id')->on('tratamientos');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicacions');
    }
}
