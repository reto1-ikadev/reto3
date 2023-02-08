<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\Alumno;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();
        $resultado = ['sucess' => true, "data" => $personas];
        return $resultado;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(string $tipo)
    {
        $tutores = Persona::where("tipo",$tipo)->get();

        $resultado = $resultado = ['sucess' => true, "data" => $tutores];
        return $resultado;
    }
    public function tutorLibre(string $tipo)
    {
       //return tutores_academicos que no esten en la tabla grados
        $coordinadores = Grado::all();
        $tutores = Persona::where("tipo",$tipo)->get();
        $tutoresLibres = [];
        foreach ($tutores as $tutor) {
            $coordinador = $coordinadores->where("id_coordinador",$tutor->id)->first();
            if($coordinador == null){
                array_push($tutoresLibres,$tutor);
            }
        }
        $resultado = ['sucess' => true, "data" => $tutoresLibres];
       return $resultado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
