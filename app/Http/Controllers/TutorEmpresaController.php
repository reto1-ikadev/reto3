<?php

namespace App\Http\Controllers;

use App\Models\TutorEmpresa;
use App\Models\Persona;
use Illuminate\Http\Request;

class TutorEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutorEmpresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tutorE = new TutorEmpresa();
        $ide_tutorE = Persona::select('id')->latest()->first();
       
        $tutorE->id_tutor_empresa= $ide_tutorE->id;
        $tutorE->id_empresa = request('id_empresa');
        $tutorE->departamento = request('departamento');
       
        $tutorE->save();
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TutorEmpresa  $tutorEmpresa
     * @return \Illuminate\Http\Response
     */
    public function show(TutorEmpresa $tutorEmpresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TutorEmpresa  $tutorEmpresa
     * @return \Illuminate\Http\Response
     */
    public function edit(TutorEmpresa $tutorEmpresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TutorEmpresa  $tutorEmpresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TutorEmpresa $tutorEmpresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TutorEmpresa  $tutorEmpresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(TutorEmpresa $tutorEmpresa)
    {
        //
    }
}
