<?php

namespace App\Http\Controllers;

use App\Mail\NuevoUsuario;
use App\Models\Alumno;

use App\Models\TutorAcademico;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TutorAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            return view('tutorAcademico.misEstudiantes');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutorAcademico.create');
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
        $idTutor_Academico = $persona->id;


        $tutor_academico = new TutorAcademico;
        $tutor_academico->id_tutor_academico = $idTutor_Academico;
        $tutor_telefono = request('telefono_academico');
        $tutor_academico->telefono_academico = $tutor_telefono;
        $tutor_academico->save();

        $usuario = new User;
        $usuario->id_persona = $idTutor_Academico;
        $usuario->email = request('email');
        $password = md5(random_bytes(4));
        $usuario->password = Hash::make($password);

        $usuario->save();
        Mail::to($usuario->email)->send(new NuevoUsuario(['email'=>$usuario->email, 'password'=>$password]));




        return true;
    }//

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TutorAcademico  $tutorAcademico
     * @return \Illuminate\Http\Response
     */
    public function show(TutorAcademico $tutorAcademico)
    {
        //
        return view('tutorAcademico.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TutorAcademico  $tutorAcademico
     * @return \Illuminate\Http\Response
     */
    public function edit(TutorAcademico $tutorAcademico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TutorAcademico  $tutorAcademico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TutorAcademico $tutorAcademico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TutorAcademico  $tutorAcademico
     * @return \Illuminate\Http\Response
     */
    public function destroy(TutorAcademico $tutorAcademico)
    {
        //
    }
    public static function selectAllAlumnosIdTutor(Request $request)
    {
        $request->validate([
            'nombre' => 'string|max:255|nullable',
            'curso' => 'string|max:255|nullable',
            'grado' => 'string|max:255|nullable',
            'empresa' => 'string|max:255|nullable',
            'pagina' => 'numeric|nullable',
        ]);
        $pagina = $request->pagina;
        $id_tutor = auth()->user()->id;
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
            ->join('tutores_academicos', 'alumnos.id_tutor_academico', '=', 'tutores_academicos.id_tutor_academico')
            ->join('empresas', 'tutores_empresas.id_empresa', '=', 'empresas.id')
            ->select('alumnos.id_alumno', 'personas.nombre', 'personas.apellidos', 'cursos.nombre as curso', 'grados.nombre as grado', 'empresas.nombre as empresa')
            ->where([
                ['personas.nombre', 'like', '%' . $request->nombre . '%'],
                ['cursos.nombre', 'like', $request->curso],
                ['grados.nombre', 'like', $request->grado],
                ['empresas.nombre', 'like', $request->empresa],
                ['alumnos.id_tutor_academico', '=', $id_tutor],
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

    public static function selectAllTutores(Request $request)
    {
        $request->validate([
            'nombre' => 'string|max:255|nullable',
        ]);
        $pagina = $request->pagina;
        //only grado of the coordinator logged



        $request->nombre = $request->nombre == '' ? '%' : $request->nombre;
        //query with join id_alumno, id_persona
        $tutores = TutorAcademico::join('personas', 'tutores_academicos.id_tutor_academico', '=', 'personas.id')
            ->join('users', 'users.id_persona', '=', 'personas.id')
            ->select('personas.*', 'users.email')
            ->where([
                ['personas.nombre', 'like', '%' . $request->nombre . '%'],
            ])
            ->orderBy('personas.id', 'desc');
        $tutoresTotal = $tutores->count();
        $resultados = $tutores->offset(($pagina - 1) * 10)->limit(10)->get();


        $datos = [
            'estudiantes' => $resultados,
            'total' => $tutoresTotal,
            'pagina' => intval($pagina),
            'por_pagina' => 10,
        ];
        return ['success' => true, 'data' => $datos, 'message' => 'Estudiantes obtenidos correctamente'];
    }
}
