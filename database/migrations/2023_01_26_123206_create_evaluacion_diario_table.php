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
        Schema::create('evaluacion_diario', function (Blueprint $table) {
            $table->id();
            $table->string('regularidad_nota',20);
            $table->string('regularidad_obs',200);
            $table->string('orden_nota',20);
            $table->string('orden_obs',200);
            $table->string('contenido_nota',20);
            $table->string('contenido_obs',200);
            $table->string('terminologia_nota',20);
            $table->string('terminologia_obs',200);
            $table->string('calidad_nota',20);
            $table->string('calidad_obs',200);
            $table->string('conceptos_nota',20);
            $table->string('conceptos_obs',200);
            $table->string('reflexion_nota',20);
            $table->string('reflexion_obs',200);
            $table->string('nota_final',20);
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
        Schema::dropIfExists('evaluacion_diario');
    }
};
