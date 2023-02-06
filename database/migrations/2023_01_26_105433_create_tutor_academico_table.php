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
       //create child table
        Schema::create('tutores_academicos', function (Blueprint $table) {
            $table->foreignId('id_tutor_academico')->constrained('personas')->onDelete('cascade');
            $table->string('telefono_academico', 20);
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
        Schema::dropIfExists('tutor_academico');
    }
};
