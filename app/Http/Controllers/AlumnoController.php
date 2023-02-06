<?php

namespace App\Http\Controllers;
use App\Models\GradoCordinador;
use App\Models\Persona;
use App\Models\Alumno;
use Illuminate\Http\Request;
session_start();


class AlumnoController extends Controller
{
    public function index(){
        //select de todos los estudiantes
       // $estudiantes = Estudiante::all();
        //get session user id

        $id = auth()->user()->id;
        $existe = GradoCordinador::where('id_coordinador', $id)->first();
        if($existe != null){
              return view('alumno.index');
           }
    }

    public function show(int $id){
        //select de un estudiante
        $estudiante = Persona::find($id);

        return view('alumno.show', ['estudiante' => $estudiante]);
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
        $alumno = new Alumno;
        $ide_alumno = Persona::select('id')->latest()->first();

        $alumno->id_alumno= $ide_alumno->id;
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


