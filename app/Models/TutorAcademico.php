<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorAcademico extends Model
{
    use HasFactory;

    protected $table = 'tutores_academicos';
    protected $primaryKey = 'id_tutor_academico';
    protected $fillable = [
        'telefono_academico',
    ];

    public $incrementing = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'id_tutor_academico');
    }
    public function calificaciones_historial(){
        return $this->hasMany(CalificacionesHistorial::class,'id');
    }
}
