<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'grados';

    protected $fillable = [
        'nombre',
    ];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

    public function tutor_academico()
    {
        return $this->hasOne(TutorAcademico::class);
    }

}
