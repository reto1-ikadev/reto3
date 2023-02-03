<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
// Clase que nos permite obtener la fecha
use Carbon\Carbon;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        $resultado = ['sucess' => true, "data" => $cursos];
        return $resultado;
    }

    /**
     *
     * Esta funcion de aque nos permite obtener los datos escritos en asistentes.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $arr = array();
        $num = 1;
        while($request->input('asistente' . $num)) {
            $arr[$num - 1] = $request->input('asistente' . $num);
            $num++;
        }
        return $arr;
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
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        $tiempo = Carbon::now()->format('d/m/Y'); // Variable que almacena la fecha en dicho formato
        return(view('reuniones.show', ['fecha' => $tiempo]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }
}
