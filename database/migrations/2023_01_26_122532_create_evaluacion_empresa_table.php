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
        Schema::create('evaluacion_empresa', function (Blueprint $table) {
            $table->id();
            $table->string('actitud_nota', 20);
            $table->string('actitud_obs', 200);
            $table->string('puntualidad_nota', 20);
            $table->string('puntualidad_obs', 200);
            $table->string('responsabilidad_nota', 20);
            $table->string('responsabilidad_obs', 200);
            $table->string('resolucion_problemas_nota', 20);
            $table->string('resolucion_problemas_obs', 200);
            $table->string('calidad_trabajos_nota', 20);
            $table->string('calidad_trabajos_obs', 200);
            $table->string('implicacion_nota', 20);
            $table->string('implicacion_obs', 200);
            $table->string('decisiones_nota', 20);
            $table->string('decisiones_obs', 200);
            $table->string('comunicacion_nota', 20);
            $table->string('comunicacion_obs', 200);
            $table->string('planificacion_nota', 20);
            $table->string('planificacion_obs', 200);
            $table->string('aprendizaje_nota', 20);
            $table->string('aprendizaje_obs', 200);
            $table->string('nota_final', 20);
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
        Schema::dropIfExists('evaluacion_empresa');
    }
};
