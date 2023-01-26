<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorEmpresaController extends Controller
{
    public function index(){
        $tutoresEmpresa=[
                
            "1"=>"Alex",
       
            "2"=>"Damian"
        ];

        return view('coordinador.index', ['tutoresEmpresa'=>$tutoresEmpresa, 'tipo'=>'tutoresEmpresa']);
    }
    /**
     * Funcion que devuelve la vista con el formulario para crear nuevas empresas
     */
    public function create(){
        return view('tutorEmpresa.create');
    }
}
