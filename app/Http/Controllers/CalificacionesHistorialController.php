<?php

namespace App\Http\Controllers;

use App\Models\CalificacionesHistorial;
use App\Models\EvaluacionDiario;
use App\Models\EvaluacionEmpresa;
use App\Models\Grado;
use App\Models\Persona;
use App\Models\Alumno;
use Illuminate\Http\Request;

class CalificacionesHistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grado = Grado::where('id_coordinador',auth()->user()->id_persona)->first();
        $calificacionesHistorial = CalificacionesHistorial::all()->where('id_tutor_academico', auth()->user()->id_persona);

        return view('calificacionesHistorial.show',["calificacionesHistorial"=>$calificacionesHistorial]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Persona $estudiante)
    {
        $alumno = Alumno::find($estudiante->id);
        $tutorE = Persona::find($alumno->id_tutor_empresa);
        $tutorA = Persona::find($alumno->id_tutor_academico);
        return view('calificacionesHistorial.create',["estudiante"=>$estudiante ,"tutorA"=>$tutorA,"tutorE"=>$tutorE]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evaluacionDiario = new EvaluacionDiario;
        $evaluacionDiario->regularidad_nota = request('regularidad_nota');
        $evaluacionDiario->regularidad_obs = request('regularidad_obs');
        $evaluacionDiario->orden_nota = request('orden_nota');
        $evaluacionDiario->orden_obs = request('orden_obs');
        $evaluacionDiario->contenido_nota = request('contenido_nota');
        $evaluacionDiario->contenido_obs = request('contenido_obs');
        $evaluacionDiario->terminologia_nota =request('terminologia_nota');
        $evaluacionDiario->terminologia_obs = request('terminologia_obs');
        $evaluacionDiario->calidad_nota = request('calidad_nota');
        $evaluacionDiario->calidad_obs = request('calidad_obs');
        $evaluacionDiario->conceptos_nota = request('conceptos_nota');
        $evaluacionDiario->conceptos_obs = request('conceptos_obs');
        $evaluacionDiario->reflexion_nota = request('reflexion_nota');
        $evaluacionDiario->reflexion_obs = request('reflexion_nota');
        $evaluacionDiario->nota_final = request('nota_final');
        $evaluacionDiario->save();

        $idEvaluacionDiario = $evaluacionDiario->id;

        $evaluacionEmpresa = new EvaluacionEmpresa;
        $evaluacionEmpresa->actitud_nota = request('actitud_nota');
        $evaluacionEmpresa->actitud_obs = request('actitud_obs');
        $evaluacionEmpresa->puntualidad_nota = request('puntualidad_nota');
        $evaluacionEmpresa->puntualidad_obs = request('puntualidad_obs');
        $evaluacionEmpresa->responsabilidad_nota = request('responsabilidad_nota');
        $evaluacionEmpresa->responsabilidad_obs = request('responsabilidad_obs');
        $evaluacionEmpresa->resolucion_nota = request('resolucion_nota');
        $evaluacionEmpresa->resolucion_obs = request('resolucion_obs');
        $evaluacionEmpresa->calidad_nota = request('calidad_nota');
        $evaluacionEmpresa->calidad_obs = request('calidad_obs');
        $evaluacionEmpresa->implicacion_nota = request('implicacion_nota');
        $evaluacionEmpresa->implicacion_obs = request('implicacion_obs');
        $evaluacionEmpresa->decisiones_nota = request('decisiones_nota');
        $evaluacionEmpresa->decisiones_obs = request('decisiones_obs');
        $evaluacionEmpresa->comunicacion_nota = request('comunicacion_nota');
        $evaluacionEmpresa->comunicacion_obs = request('comunicacion_obs');
        $evaluacionEmpresa->planificacion_nota = request('planificacion_nota');
        $evaluacionEmpresa->planificacion_obs = request('planificacion_obs');
        $evaluacionEmpresa->aprendizaje_nota = request('aprendizaje_nota');
        $evaluacionEmpresa->aprendizaje_obs = request('aprendizaje_obs');
        $evaluacionEmpresa->nota_final = request('nota_final_empresa');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalificacionesHistorial  $calificacionesHistorial
     * @return \Illuminate\Http\Response
     */
    public function show(CalificacionesHistorial $calificacionesHistorial)
    {
        //
 }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalificacionesHistorial  $calificacionesHistorial
     * @return \Illuminate\Http\Response
     */
    public function edit(CalificacionesHistorial $calificacionesHistorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalificacionesHistorial  $calificacionesHistorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalificacionesHistorial $calificacionesHistorial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalificacionesHistorial  $calificacionesHistorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalificacionesHistorial $calificacionesHistorial)
    {
        //
    }
}
