<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;

    protected $table = 'empresa';
    protected $fillable = [
        'nombre',
        'cif',
        'direccion',
        'telefono',
        'email_contacto',
        'sector'
    ];
  
}
