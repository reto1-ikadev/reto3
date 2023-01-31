<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'telefono'
    ];

    public function opcion_tipo(){
        switch ($this->tipo) {
            case 'alumno':
                return $this->hasOne(Alumno::class,'id_alumno');
                break;
            case 'tutor_academico':
            case 'coordinador':
                return $this->hasOne(TutorAcademico::class, 'id_tutor_academico');
                break;
            case 'tutor_empresa':
                return $this->hasOne(TutorEmpresa::class, 'id_tutor_empresa');
                break;
            default:
                return null;
                break;
        }
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }



}
