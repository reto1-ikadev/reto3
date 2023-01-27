<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoordinadorController extends Controller
{
    public function index()
    {
        return view('coordinador.index');
    }
    /**
     * Funcion que devuelve la vista con el formulario para crear nuevos coordinadores
     */
    public function create(){
    return view('coordinador.create');
    }

}

