<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reuniones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('tipo_lugar', 50);
            $table->string('objetivos', 200);
            $table->string('aspectos', 100);
            //foreign key personas id column convocante
            $table->unsignedBigInteger('convocante_id');
            $table->foreign('convocante_id')->references('id')->on('personas');
            $table->string('asistentes', 200);
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
        Schema::dropIfExists('reuniones');
    }
};
