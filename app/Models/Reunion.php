<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    /*
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
    */
    use HasFactory;

    protected $table = "reuniones";

    public $timestamps = true;

    protected $fillable = [
        'fecha',
        'tipo_lugar',
        'objetivos',
        'aspectos',
        'asistentes',
        'convocante_id'
    ];

    public function persona() {
        return $this->hasOne(Persona::class, 'id', 'convocante_id');
    }
}
