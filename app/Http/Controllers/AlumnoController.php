<?php

namespace App\Http\Controllers;
use App\Mail\NuevoUsuario;
use App\Models\Grado;
use App\Models\GradoCoordinadores;
use App\Models\GradoCordinador;
use App\Models\Persona;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\TutorAcademico;
use App\Models\TutorEmpresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

session_start();


class AlumnoController extends Controller
{
    public function index(){

        $id = auth()->user()->id_persona;
        $grado = Grado::where('id_coordinador',$id)->first();

        return view('alumno.index', ['grado' => $grado]);
    }

    public function show(int $id){
        //
        $estudiante = Persona::find($id);
        $alumno = Alumno::find($id);
        $tutorE = Persona::find($alumno->id_tutor_empresa);
        $tutorA = Persona::find($alumno->id_tutor_academico);

        return view('alumno.show', ['estudiante' => $estudiante,"tutorE"=>$tutorE,"tutorA"=>$tutorA]);
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

        $alumno = new Alumno;
        $alumno->id_alumno= $idAlumno;
        $alumno->id_curso = request('id_curso');
        $alumno->id_tutor_academico = request('id_tutor_academico');
        $alumno->id_tutor_empresa = request('id_tutor_empresa');
        $alumno->direccion = request('direccion');
        $alumno->save();

        $usuario = new User;
        $usuario->id_persona = $idAlumno;
        $usuario->email = request('email');
        $password = md5(random_bytes(4));
        $usuario->password = Hash::make($password);
        $usuario->save();

        Mail::to($usuario->email)->send(new NuevoUsuario(['email'=>$usuario->email, 'password'=>$password]));
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


        //
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
            'empresa' => 'string|max:255|nullable',
            'pagina' => 'numeric|nullable',
        ]);
        $pagina = $request->pagina;
        $id = auth()->user()->id;
        $grado = Grado::where('id_coordinador', $id)->first();

        $request->curso = $request->curso == '' ? '%' : $request->curso;
        $request->empresa = $request->empresa == '' ? '%' : $request->empresa;
        $request->nombre = $request->nombre == '' ? '%' : $request->nombre;
        $request->page = $request->page == '' ? 1 : $request->page;

            $estudiantes = Alumno::join('personas', 'alumnos.id_alumno', '=', 'personas.id')
                ->join('cursos', 'alumnos.id_curso', '=', 'cursos.id')
                ->join('grados', 'cursos.id_grado', '=', 'grados.id')
                ->join('tutores_empresas', 'alumnos.id_tutor_empresa', '=', 'tutores_empresas.id_tutor_empresa')
                ->join('empresas', 'tutores_empresas.id_empresa', '=', 'empresas.id')
                ->select('alumnos.id_alumno', 'personas.nombre', 'personas.apellidos', 'cursos.nombre as curso', 'grados.nombre as grado', 'empresas.nombre as empresa')
                ->where([
                    ['personas.nombre', 'like', '%' . $request->nombre . '%'],
                    ['cursos.nombre', 'like', $request->curso],
                    ['grados.id', "like", $grado->id],
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


