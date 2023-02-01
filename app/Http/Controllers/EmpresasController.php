<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        $resultado = ['sucess' => true, "data" => $empresas];
        return $resultado;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa;
        $empresa->nombre = request('nombre');
        $empresa->cif = request('cif');
        $empresa->direccion = request('direccion');
        $empresa->email_contacto = request('email');
        $empresa->sector = request('sector');
        $empresa->save();
        
        
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $Empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $Empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $Empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $Empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $Empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $Empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $Empresa)
    {
        //
    }
}
