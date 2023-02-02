<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorEmpresa extends Model
{
    use HasFactory;

    protected $table = 'tutores_empresas';
    protected $primaryKey = 'id_tutor_empresa';
    protected $fillable = [
        'departamento',
    ];

    public $incrementing = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }


}
