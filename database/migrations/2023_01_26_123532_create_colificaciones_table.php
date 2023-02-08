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
        Schema::create('calificaciones_historial', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_evaluacion_diario')->nullable();
            $table->foreign('id_evaluacion_diario')->references('id')->on('evaluacion_diario')->onDelete('set null');
            $table->unsignedBigInteger('id_evaluacion_empresa')->nullable();
            $table->foreign('id_evaluacion_empresa')->references('id')->on('evaluacion_empresa')->onDelete('set null');
            $table->unsignedBigInteger('id_alumno')->nullable();
            $table->foreign('id_alumno')->references('id_alumno')->on('alumnos')->onDelete('set null');
            $table->unsignedBigInteger('id_tutor_academico')->nullable();
            $table->foreign('id_tutor_academico')->references('id_tutor_academico')->on('tutores_academicos')->onDelete('set null');
            $table->unsignedBigInteger('id_tutor_empresa')->nullable();
            $table->foreign('id_tutor_empresa')->references('id_tutor_empresa')->on('tutores_empresas')->onDelete('set null');
            $table->unsignedBigInteger('id_curso')->nullable();
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('set null');
            $table->unsignedBigInteger('id_ano_academico')->nullable();
            $table->foreign('id_ano_academico')->references('id')->on('anos_academicos')->onDelete('set null');
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
        Schema::dropIfExists('calificaciones');
    }
};
