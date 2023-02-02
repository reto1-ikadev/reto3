<?php

namespace App\Http\Controllers;

use App\Models\AnosAcademicos;
use Illuminate\Http\Request;

class AnosAcademicosController extends Controller
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
        return view('anyo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required'
        ]);
        AnosAcademicos::create($validated);
        return redirect(route('cursos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnosAcademicos  $anosAcademicos
     * @return \Illuminate\Http\Response
     */
    public function show(AnosAcademicos $anosAcademicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnosAcademicos  $anosAcademicos
     * @return \Illuminate\Http\Response
     */
    public function edit(AnosAcademicos $anosAcademicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnosAcademicos  $anosAcademicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnosAcademicos $anosAcademicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnosAcademicos  $anosAcademicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnosAcademicos $anosAcademicos)
    {
        //
    }
}
