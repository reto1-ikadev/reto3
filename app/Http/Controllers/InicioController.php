<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\AnosAcademicos;
use App\Models\CalificacionesHistorial;
use App\Models\Persona;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function index(){

        $id = auth()->user()->persona->id;
        if (auth()->user()->persona->tipo == 'alumno'){
        $alumno = Persona::find($id);
        $tutor_academico = Persona::find($alumno->opcion_tipo->id_tutor_academico);
        $tutor_empresa = Persona::find($alumno->opcion_tipo->id_tutor_empresa);
        
        $calificacionesHistorial = CalificacionesHistorial::all()->where('id_alumno', '=', $alumno->id);
        
        return view('index',  ['alumno'=> $alumno, 'tutor_academico'=> $tutor_academico, 'tutor_empresa'=> $tutor_empresa,"historial"=>$calificacionesHistorial]);}

        if (auth()->user()->persona->tipo == 'tutor_academico' || auth()->user()->persona->tipo == 'coordinador'){
        $tutor_academico = Persona::find($id);
        $alumnos = Alumno::where('id_tutor_academico', $id)->get();
        return view('index',  ['tutor_academico'=> $tutor_academico, 'alumnos'=> $alumnos]);}
        }


}
