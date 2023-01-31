<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index(){
        //select de todos los estudiantes
       // $estudiantes = Estudiante::all();
        $estudiantes=[

                    "1"=>"iker",

                    "2"=>"celia"
        ];
        return view('coordinador.index', ['estudiantes'=>$estudiantes , 'tipo'=>'estudiante']);
    }

    public function show(/*Estudiante*/ $estudiante)
    {
        return view('coordinador.show', ['estudiante' => $estudiante]);
    }
    /**
     * Funcion que devuelve la vista con el formulario para crear nuevos estudiantes
     */
    public function create(){
        return view('estudiante.create');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        return true;
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
