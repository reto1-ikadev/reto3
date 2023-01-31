<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';

    protected $primaryKey = 'id_alumno';

    protected $fillable = [
        'direccion',
    ];

    public $incrementing = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function tutor_academico()
    {
        return $this->belongsTo(TutorAcademico::class, 'id_tutor_academico');
    }

    public function tutor_empresa()
    {
        return $this->belongsTo(TutorEmpresa::class, 'id_tutor_empresa');
    }


}
