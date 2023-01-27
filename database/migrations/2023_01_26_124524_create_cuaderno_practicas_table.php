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
        Schema::create('cuaderno_practicas', function (Blueprint $table) {
            $table->id();
            $table->string('periodo', 100);
            $table->string('actividades_realizadas', 200);
            $table->string('aprendizaje', 200);
            $table->string('problemas', 200);
            $table->string('comentario_tutor', 200);
            $table->unsignedBigInteger('id_alumno');
            $table->foreign('id_alumno')->references('id_alumno')->on('alumnos')->onDelete('cascade');
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
        Schema::dropIfExists('cuaderno_practicas');
    }
};
