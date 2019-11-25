<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfermedadsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('enfermedads');

        Schema::create('enfermedads', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->unsignedInteger('especialidad_id');
            $table->timestamps();

            $table->foreign('especialidad_id')->references('id')->on('especialidads');
        });
    }

    public function down()
    {
        Schema::dropIfExists('enfermedads');
    }
}
