<?php

namespace App\Http\Controllers;

use App\Mail\NuevoUsuario;
use App\Models\TutorEmpresa;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        $tutorE = new TutorEmpresa();
        $tutorE->id_tutor_empresa = $idPersona;
        $tutorE->id_empresa = request('id_empresa');
        $tutorE->departamento = request('departamento');
        $tutorE->save();
        
        $usuario = new User;
        $usuario->id_persona = $idPersona;
        $usuario->email = request('email');
        $password = md5(random_bytes(4));
        $usuario->password = Hash::make($password);
        $usuario->save();


        Mail::to($usuario->email)->send(new NuevoUsuario(['email'=>$usuario->email, 'password'=>$password]));
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
    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'string|nullable',
            'apellido' => 'string|nullable',
            'email' => 'string|nullable'
        ]);
        $persona = Persona::find($request->id);
        $persona->nombre = request('nombre');
        $persona->apellidos = request('apellidos');
        $persona->update();

        $usuario = User::find($request->id_user);
        $usuario->email = request('email');
        $usuario->update();


        return redirect(route('tutoresEmpresa.index'));
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
                ['empresas.nombre', 'like',  $request->empresa],
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
