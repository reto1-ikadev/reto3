<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradoCordinador extends Model
{
    use HasFactory;

    protected $table = 'grado_coordinadores';

    protected $fillable = [
        'id_grado',
        'id_coordinador',
    ];

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'id');
    }

    public function coordinador()
    {
        return $this->belongsTo(Coordinador::class, 'id_coordinador');
    }
}
