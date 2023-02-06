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
        Schema::create('grado_coordinadores', function (Blueprint $table) {
            $table->unsignedBigInteger('id_grado');
            $table->foreign('id_grado')->references('id')->on('grados')->onDelete('cascade');
            $table->unsignedBigInteger('id_coordinador');
            $table->foreign('id_coordinador')->references('id_tutor_academico')->on('tutores_academicos')->onDelete('cascade');
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
        Schema::dropIfExists('grado_coordinadores');
    }
};
