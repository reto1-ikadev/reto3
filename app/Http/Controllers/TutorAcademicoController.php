<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\TutorAcademico;
use App\Models\Persona;
use Illuminate\Http\Request;

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

            return view('tutorAcademico.index');

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
        $tutorA = new TutorAcademico();
        $ide_tutorA = Persona::select('id')->latest()->first();

        $tutorA->id_tutor_academico= $ide_tutorA->id;
        $tutorA->telefono_academico = request('telefono_academico');

        $tutorA->save();
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
        $request->grado = $request->grado == 0 ? '%' : $request->grado;
        $request->curso = $request->curso == 0 ? '%' : $request->curso;
        $request->empresa = $request->empresa == '' ? '%' : $request->empresa;
        $request->nombre = $request->nombre == '' ? '%' : $request->nombre;
        $request->page = $request->page == '' ? 1 : $request->page;
        //query with join id_alumno, id_persona
        $estudiantes = Alumno::join('personas', 'alumnos.id_alumno', '=', 'personas.id')
            ->join('cursos', 'alumnos.id_curso', '=', 'cursos.id')
            ->join('grados', 'cursos.id_grado', '=', 'grados.id')
            ->join('tutores_empresas', 'alumnos.id_tutor_empresa', '=', 'tutores_empresas.id_tutor_empresa')
            //join con tutores academicos
            ->join('tutores_academicos', 'alumnos.id_tutor_academico', '=', 'tutores_academicos.id_tutor_academico')
            ->join('empresas', 'tutores_empresas.id_empresa', '=', 'empresas.id')
            ->select('alumnos.id_alumno', 'personas.nombre', 'personas.apellidos', 'cursos.nombre as curso', 'grados.nombre as grado', 'empresas.nombre as empresa')
            ->where([
                ['personas.nombre', 'like', '%' . $request->nombre . '%'],
                ['cursos.id', 'like', $request->curso],
                ['grados.id', 'like', $request->grado],
                ['empresas.nombre', 'like', $request->empresa],
                ['tutores_academicos.id_tutor_academico', '=', $id_tutor],
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
