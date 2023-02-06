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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->foreignId('id_alumno')->constrained('personas')->onDelete('cascade');
            $table->foreignId('id_curso')->constrained('cursos')->onDelete('cascade');
            $table->unsignedBigInteger('id_tutor_academico')->nullable();
            $table->foreign('id_tutor_academico')->references('id_tutor_academico')->on('tutores_academicos')->onDelete('set null');
            $table->unsignedBigInteger('id_tutor_empresa')->nullable();
            $table->foreign('id_tutor_empresa')->references('id_tutor_empresa')->on('tutores_empresas')->onDelete('set null');
            $table->string('direccion', 100);
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
        Schema::dropIfExists('alumnos');
    }
};
