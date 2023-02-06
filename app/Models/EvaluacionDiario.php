<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionDiario extends Model
{
    use HasFactory;
    protected $table = 'evaluacion_diario';
    protected $primaryKey ='id';
    protected $fillable = [
        'regularidad_nota',
        'regularidad_obs',
        'orden_nota',
        'orden_obs',
        'contenido_nota',
        'contenido_obs',
        'terminologia_nota',
        'terminologia_obs',
        'calidad_nota',
        'calidad_obs',
        'conceptos_nota',
        'conceptos_obs',
        'reflexion_nota',
        'reflexion_obs',
        'nota_final'
    ];

    public function calificaciones_historial(){
        return $this->hasMany(CalificacionesHistorial::class,'id');
    }
}
