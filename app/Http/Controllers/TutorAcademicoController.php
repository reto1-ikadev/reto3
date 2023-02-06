<?php

namespace App\Http\Controllers;

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
        return view('cordinador.index');
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
}
