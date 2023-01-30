<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';
protected $fillable = [
        'nombre',
        'cif',
        'email',
        'direccion',
        'sector',
    ];
    public function tutor_empresa()
    {
        return $this->hasMany(TutorEmpresa::class);
    }

}
