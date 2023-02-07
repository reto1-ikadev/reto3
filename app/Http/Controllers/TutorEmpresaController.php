<?php

namespace App\Http\Controllers;

use App\Models\TutorEmpresa;
use App\Models\Persona;
use App\Models\User;
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
        return view('tutorEmpresa.index');
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

        $persona = new Persona;
        $persona->nombre = request('nombre');
        $persona->apellidos = request('apellido');
        $persona->dni = request('dni');
        $persona->telefono = request('telefono');
        $persona->tipo = request('tipo');
        $persona->save();
        $idPersona = $persona->id;

        $usuario = new User;
        $usuario->id_persona = $idPersona;
        $usuario->email = request('email');
        $usuario->password = request('password');
        $usuario->save();

        $tutorE = new TutorEmpresa();
        $tutorE->id_tutor_empresa = $idPersona;
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

    public function selectAllTutoresEmpresas(Request $request){
        $request->validate([
            'empresa' => 'string|nullable',
            'departamento' => 'string|nullable',
            'nombre' => 'string|nullable',
            'pagina' => 'numeric|nullable'
        ]);

        $pagina = $request->pagina;

        $request->empresa = $request->empresa == '' ? '%' : $request->empresa;
        $request->departamento = $request->departamento == '' ? '%' : $request->departamento;
        $request->nombre = $request->nombre == '' ? '%' : $request->nombre;
        $request->page = $request->page == '' ? 1 : $request->page;

        $empresas = TutorEmpresa::join('empresas', 'tutores_empresas.id_empresa', '=', 'empresas.id')
            ->join('personas', 'tutores_empresas.id_tutor_empresa', '=', 'personas.id')
            ->join('users', 'tutores_empresas.id_tutor_empresa', '=', 'users.id')
            ->select('personas.nombre as nombrePersona', 'personas.apellidos', 'users.email', 'empresas.nombre', 'tutores_empresas.departamento', 'users.id as id_user', 'personas.id')
            ->where([
                ['empresas.nombre', 'like', '%' . $request->nombre . '%'],
                ['tutores_empresas.departamento', 'like', '%' . $request->departamento . '%'],
            ])
            ->orderby('tutores_empresas.id_tutor_empresa', 'desc');

        $empresasTotal = $empresas->count();
        $resultados = $empresas->offset(($pagina -1) * 10)->limit(10)->get();
        $datos = [
            'empresas' => $resultados,
            'total' => $empresasTotal,
            'pagina' => intval($pagina),
            'por_pagina' => 10
        ];

        return ['success' => true, 'data' => $datos, 'message' => 'Tutores de empresas obtenidos correctamente'];
    }
}
