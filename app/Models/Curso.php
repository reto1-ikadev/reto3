<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = [
        'nombre',
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id_grado');
    }
    public function calificaciones_historial(){
        return $this->hasMany(CalificacionesHistorial::class,'id');
    }
}
