<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionEmpresa extends Model
{
    
    use HasFactory;
    protected $table = 'evaluacion_empresa';
    protected $primaryKey ='id';
    protected $fillable = [
        'actitud_nota',
        'actitud_obs',
        'puntualidad_nota',
        'puntualidad_obs',
        'responsabilidad_nota',
        'responsabilidad_obs',
        'resolucion_nota',
        'resolucion_obs',
        'calidad_trabajos_nota',
        'calidad_trabajos_obs',
        'implicacion_nota',
        'implicacion_obs',
        'decisiones_nota',
        'decisiones_obs',
        'comunicacion_nota',
        'comunicacion_obs',
        'planificacion_nota',
        'planificacion_obs',
        'aprendizaje_nota',
        'aprendizaje_obs',
        'nota_final'
    ];
    public function calificaciones_historial(){
        return $this->hasMany(CalificacionesHistorial::class,'id');
    }
}
