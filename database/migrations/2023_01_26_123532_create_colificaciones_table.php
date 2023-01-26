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
            $table->id('id_calificacion');
            $table->foreignId('id_evaluacion_diario')->constrained('evaluacion_diario')->onDelete('cascade');
            $table->foreignId('id_evaluacion_empresa')->constrained('evaluacion_empresa')->onDelete('cascade');
            $table->foreignId('id_alumno')->constrained('alumnos')->onDelete('cascade');
            $table->foreignId('id_tutor_academico')->constrained('tutores_academicos')->onDelete('cascade');
            $table->foreignId('id_tutor_empresa')->constrained('tutores_empresas')->onDelete('cascade');
            $table->foreignId('id_curso')->constrained('cursos')->onDelete('cascade');
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
