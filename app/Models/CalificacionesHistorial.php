<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalificacionesHistorial extends Model
{
    use HasFactory;
    protected $table ='calificaciones_historial';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_evaluacion_diario',
        'id_evaluacion_empresa',
        'id_alumno',
        'id_tutor_academico',
        'id_tutor_empresa',
        'id_curso',
        'id_ano_academico'
    ];
    public function evaluacion_diario(){
        return $this->belongsTo(EvaluacionDiario::class,'id_evaluacion_diario');
    }
    public function evaluacion_empresa(){
        return $this->belongsTo(EvaluacionEmpresa::class,'id_evaluacion_empresa');
    }
    public function alumnos(){
        return $this->belongsTo(Alumno::class,'id_alumno');
    }
    public function tutores_academicos(){
        return $this->belongsTo(TutorAcademico::class,'id_tutor_academico', 'id_tutor_academico');
    }
    public function tutores_empresas(){
        return $this->belongsTo(TutorEmpresa::class,'id_tutor_empresa');
    }
    public function curso(){
        return $this->belongsTo(Curso::class,'id');
    }
    public function anos_academicos(){
        return $this->belongsTo(AnosAcademicos::class,'id_ano_academico' );
    }
}
