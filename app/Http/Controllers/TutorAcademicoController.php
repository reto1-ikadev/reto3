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

        return view('coordinador.contenido', ['tutoresAcademicos'=>$tutoresAcademicos, 'tipo'=>'tutoresAcademicos']);
    }
}
