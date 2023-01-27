<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorAcademicoController extends Controller
{
    public function index(){
        $tutoresAcademicos=[
                
            "1"=>"Adrian",
       
            "2"=>"Aritz"
        ];

        return view('coordinador.index', ['tutoresAcademicos'=>$tutoresAcademicos, 'tipo'=>'tutoresAcademicos']);
    }
    /**
     * Funcion que devuelve la vista con el formulario para crear nuevas empresas
     */
    public function create(){
        return view('tutorAcademico.create');
    }
}
