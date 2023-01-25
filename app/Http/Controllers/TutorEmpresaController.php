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

        return view('coordinador.contenido', ['tutoresEmpresa'=>$tutoresEmpresa, 'tipo'=>'tutoresEmpresa']);
    }
}
