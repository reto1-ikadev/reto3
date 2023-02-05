<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Curso;
use App\Models\TutorAcademico;
use App\Models\TutorEmpresa;
use Illuminate\Http\Request;
session_start();


class AlumnoController extends Controller
{
    public function index(){
        //select de todos los estudiantes
       // $estudiantes = Estudiante::all();
        //get session user id
           $id = auth()->user()->persona->id;
           if (auth()->user()->persona->tipo == 'coordinador'){
              return view('alumno.index');
           }
    }

    public function show(int $id){
        //select de un estudiante
        $estudiante = Persona::find($id);
        $alumno = Alumno::find($id);
        $tutorE = Persona::find($alumno->id_tutor_empresa);
        $tutorA = Persona::find($alumno->id_tutor_academico);

        return view('alumno.show', ['estudiante' => $estudiante,"tutorE"=>$tutorE,"tutorA"=>$tutorA]);
    }
    public function showTutor(int $id){

    }

    /**
     * Funcion que devuelve la vista con el formulario para crear nuevos estudiantes
     */
    public function create(){
        return view('alumno.create');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona;
        $persona->nombre = request('nombre');
        $persona->apellidos = request('apellido');
        $persona->dni = request('dni');
        $persona->telefono = request('telefono');
        $persona->tipo = request('tipo');
        $persona->save();
        $idAlumno = $persona->id;

        $usuario = new User;
        $usuario->id_persona = $idAlumno;
        $usuario->email = request('email');
        $usuario->password = request('password');
        $usuario->save();


        $alumno = new Alumno;
        $alumno->id_alumno= $idAlumno;
        $alumno->id_curso = request('id_curso');
        $alumno->id_tutor_academico = request('id_tutor_academico');
        $alumno->id_tutor_empresa = request('id_tutor_empresa');
        $alumno->direccion = request('direccion');
        $alumno->save();

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
    public function update(Request $request, Alumno $estudiante)
    {
        $persona = new Persona;
        $persona = Persona::find($estudiante->id_alumno);

        $persona->nombre = request('nombre');
        $persona->apellidos = request('apellido');
        $persona->dni = request('dni');
        $persona->telefono = request('telefono');
        
        $persona->update();
        

        $usuario = User::find($persona->id);

        $usuario->email = request('email');
        $usuario->update();

        
        //Obtener el id del curso al que se va a cambiar el alumno
        $nombreNuevoCurso = $request->curso;
       
        $nuevoCurso = Curso::where('nombre','=', $nombreNuevoCurso)->first();
        
        $idNuevoCurso = $nuevoCurso->id;
        $estudiante->id_curso = $idNuevoCurso;
        $estudiante->direccion = $request->direccion;
       
        if(isset($_REQUEST['nombreTA'])){
            $estudiante->id_tutor_academico = $request->nombreTA;
        }
        if(isset($_REQUEST['nombreTE'])){
            $estudiante->id_tutor_empresa = $request->nombreTE;
        }

        $estudiante->update();

        
        


        // $estudiante->curso->nombre = request('curso');
        // $estudiante->curso->update();

        // $estudiante->curso->grado->nombre = request('grado');
        // $estudiante->curso->grado->update();
        // $estudiante->tutor_academico->id = request($tutorA->id);

        return redirect(route('estudiantes.index'));
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

    //funcion select all alumnos
    public static function selectAllAlumnos(Request $request)
    {
        $request->validate([
            'nombre' => 'string|max:255|nullable',
            'curso' => 'string|max:255|nullable',
            'grado' => 'string|max:255|nullable',
            'empresa' => 'string|max:255|nullable',
            'pagina' => 'numeric|nullable',
        ]);
        $pagina = $request->pagina;

        $request->grado = $request->grado == '' ? '%' : $request->grado;
        $request->curso = $request->curso == '' ? '%' : $request->curso;
        $request->empresa = $request->empresa == '' ? '%' : $request->empresa;
        $request->nombre = $request->nombre == '' ? '%' : $request->nombre;
        $request->page = $request->page == '' ? 1 : $request->page;
        //query with join id_alumno, id_persona
        $estudiantes = Alumno::join('personas', 'alumnos.id_alumno', '=', 'personas.id')
            ->join('cursos', 'alumnos.id_curso', '=', 'cursos.id')
            ->join('grados', 'cursos.id_grado', '=', 'grados.id')
            ->join('tutores_empresas', 'alumnos.id_tutor_empresa', '=', 'tutores_empresas.id_tutor_empresa')
            ->join('empresas', 'tutores_empresas.id_empresa', '=', 'empresas.id')
            ->select('alumnos.id_alumno', 'personas.nombre', 'personas.apellidos', 'cursos.nombre as curso', 'grados.nombre as grado', 'empresas.nombre as empresa')
            ->where([
                ['personas.nombre', 'like', '%' . $request->nombre . '%'],
                ['cursos.nombre', 'like', $request->curso],
                ['grados.nombre', 'like', $request->grado],
                ['empresas.nombre', 'like', $request->empresa],
            ])

            ->orderBy('personas.id', 'desc');
        $estudiantesTotal = $estudiantes->count();
        $resultados = $estudiantes->offset(($pagina - 1) * 10)->limit(10)->get();


        $datos = [
            'estudiantes' => $resultados,
            'total' => $estudiantesTotal,
            'pagina' => intval($pagina),
            'por_pagina' => 10,
        ];
       return ['success' => true, 'data' => $datos, 'message' => 'Estudiantes obtenidos correctamente'];
    }

}


