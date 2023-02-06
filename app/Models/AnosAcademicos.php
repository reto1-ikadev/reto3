<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnosAcademicos extends Model
{
    use HasFactory;
    protected $table = 'anos_academicos';
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'nombre'
    ];
    public function calificaciones_historial(){
        return $this->hasMany(CalificacionesHistorial::class,'id');
    }
}
