<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoCoordinadores extends Model
{
    use HasFactory;
    protected $table = 'grado_coordinadores';
    protected $fillable = [
        'id_grado',
        'id_coordinador'
    ];
    public function tutor_academico()
    {
        return $this->belongsTo(TutorAcademico::class,'id_tutor_academico');
    }
    public function grado(){
        return $this->belongsTo(Grado::class,'id_grado');
    }
}
