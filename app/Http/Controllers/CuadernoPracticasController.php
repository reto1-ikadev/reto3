<?php

namespace App\Http\Controllers;

use App\Models\CuadernoPracticas;
use Illuminate\Http\Request;

class CuadernoPracticasController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CuadernoPracticas  $cuadernoPracticas
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        return view('diario.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CuadernoPracticas  $cuadernoPracticas
     * @return \Illuminate\Http\Response
     */
    public function edit(CuadernoPracticas $cuadernoPracticas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CuadernoPracticas  $cuadernoPracticas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CuadernoPracticas $cuadernoPracticas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CuadernoPracticas  $cuadernoPracticas
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuadernoPracticas $cuadernoPracticas)
    {
        //
    }
}
