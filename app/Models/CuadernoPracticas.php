<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuadernoPracticas extends Model
{
    use HasFactory;

    protected $table = "cuaderno_practicas";

    public $timestamps = true;

    protected $fillable = [
        'periodo',
        'actividades_realizadas',
        'actividades_comentario',
        'aprendizaje',
        'aprendizaje_comentario',
        'problemas',
        'problemas_comentario',
        'id_alumno'
    ];

    public function alumno() {
        return $this->hasOne(Alumno::class, 'id');
    }
}
