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
            $table->foreignId('id_evaluacion_diario')->constrained('evaluacion_diario')->onDelete('set null');
            $table->foreignId('id_evaluacion_empresa')->constrained('evaluacion_empresa')->onDelete('set null');
            $table->foreignId('id_alumno')->constrained('alumnos')->onDelete('set null');
            $table->foreignId('id_tutor_academico')->constrained('tutores_academicos')->onDelete('set null');
            $table->foreignId('id_tutor_empresa')->constrained('tutores_empresas')->onDelete('set null');
            $table->foreignId('id_curso')->constrained('cursos')->onDelete('set null');

            $table->foreignId('id_ano_academico')->constrained('ano_academico')->onDelete('set null');
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
