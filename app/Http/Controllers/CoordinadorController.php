<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Coordinador;
use App\Models\Persona;
use Illuminate\Http\Request;

class CoordinadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coordinador.create');
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
     * @param  \App\Models\Coordinador  $coordinador
     * @return \Illuminate\Http\Response
     */
    public function show(Coordinador $coordinador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coordinador  $coordinador
     * @return \Illuminate\Http\Response
     */
    public function edit(Coordinador $coordinador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coordinador  $coordinador
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
        $id = auth()->user()->id;
        $tipo = Persona::find($id)->tipo;
        if ($tipo == 'coordinador') {
            Persona::where('id', $id)->update(['tipo' => 'tutor_academico']);
            return redirect()->route('inicio.index');
        } else if ($tipo == 'tutor_academico') {
            Persona::where('id', $id)->update(['tipo' => 'coordinador']);
            return redirect()->route('inicio.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coordinador  $coordinador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coordinador $coordinador)
    {
        //
    }
}
