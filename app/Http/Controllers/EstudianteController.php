<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index(){
        //select de todos los estudiantes
       // $estudiantes = Estudiante::all();
        $estudiantes=[
                
                    "1"=>"iker",
               
                    "2"=>"celia"
        ];
        return view('coordinador.contenido', ['estudiantes'=>$estudiantes , 'tipo'=>'estudiante']);
    }

    public function show(/*Estudiante*/ $estudiante)
    {
        return view('coordinador.show', ['estudiante' => $estudiante]);
    }
}
