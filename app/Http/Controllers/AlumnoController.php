<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index(){
        //select de todos los estudiantes
       // $estudiantes = Estudiante::all();

        return view('estudiante.index' );
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
        //
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
            'curso' => 'numeric',
            'grado' => 'numeric',
            'empresa' => 'numeric',
        ]);
        $request->grado = $request->grado == 0 ? '%' : $request->grado;
        $request->curso = $request->curso == 0 ? '%' : $request->curso;
        $request->empresa = $request->empresa == 0 ? '%' : $request->empresa;
        $request->nombre = $request->nombre == '' ? '%' : $request->nombre;
        //query with join id_alumno, id_persona
        $estudiantes = Alumno::join('personas', 'alumnos.id_alumno', '=', 'personas.id')
            ->join('cursos', 'alumnos.id_curso', '=', 'cursos.id')
            ->join('grados', 'cursos.id_grado', '=', 'grados.id')
            ->join('tutores_empresas', 'alumnos.id_tutor_empresa', '=', 'tutores_empresas.id_tutor_empresa')
            ->join('empresas', 'tutores_empresas.id_empresa', '=', 'empresas.id')
            ->select('alumnos.id_alumno', 'personas.nombre', 'personas.apellidos', 'cursos.nombre as curso', 'grados.nombre as grado', 'empresas.nombre as empresa')
            ->where([
                ['personas.nombre', 'like', '%' . $request->nombre . '%'],
                ['cursos.id', 'like', $request->curso],
                ['grados.id', 'like', $request->grado],
                ['empresas.id', 'like', $request->empresa],
            ])
            ->get();

       return ['success' => true, 'data' => $estudiantes, 'message' => 'Estudiantes obtenidos correctamente'];
    }
}


