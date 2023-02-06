<?php

namespace App\Http\Controllers;

use App\Models\CuadernoPracticas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    public function create($id)
    {
        return view('diario.show', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*DB::table('cuaderno_practicas')->insert([
            'periodo' => Carbon::now()->format('d/m/Y'),
            'actividades_realizadas' => $request->input('actDesCor'),
            'actividades_comentario' => $request->input('actDesCom'),
            'aprendizaje' => $request->input('apreCor'),
            'aprendizaje_comentario' => $request->input('apreCom'),
            'problemas' => $request->input('problemCor'),
            'problemas_comentario' => $request->input('problemCom'),
            'id_alumno' => 
        ]);*/

        return "Completado";
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
