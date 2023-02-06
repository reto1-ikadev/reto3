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

        try {

            $cuadernoPracticas = new CuadernoPracticas;

            $data = $request->input();

            $cuadernoPracticas->periodo = Carbon::now()->format('d/m/Y');

            $cuadernoPracticas->actividades_realizadas = $data['actDesCor'];

            $cuadernoPracticas->actividades_comentario = $data['actDesCom'];

            $cuadernoPracticas->aprendizaje = $data['apreCor'];

            $cuadernoPracticas->aprendizaje_comentario = $data['apreCom'];

            $cuadernoPracticas->problemas = $data['problemCor'];

            $cuadernoPracticas->problemas_comentario = $data['problemCom'];

            $cuadernoPracticas->id_alumno = $data['id_alumno'];

            $cuadernoPracticas->save();
        
        } catch(Exception $e) {
            return "Error a la hora de guardar en la base de datos el diario.";
        }

        return redirect('/misestudiantes/index');
    }

    public function obtenerDiarios(Request $request) {
        $cuadernoPracticas = new CuadernoPracticas;

        $resul = $cuadernoPracticas::select('periodo', 'actividades_realizadas', 'actividades_comentario', 'aprendizaje', 'aprendizaje_comentario', 'problemas', 'problemas_comentario')->where('id_alumno', $request->input('id'))->get();
        
        return json_encode($resul);
        //return json_encode(array('periodo' => $resul[0]->periodo, 'actividades_realizadas' => $resul[0]->actividades_realizadas, 'actividades_comentario' => $resul[0]->actividades_comentario, 'aprendizaje' => $resul[0]->aprendizaje, 'aprendizaje_comentario' => $resul[0]->aprendizaje_comentario, 'problemas' => $resul[0]->problemas, 'problemas_comentario' => $resul[0]->problemas_comentario));
        //return var_dump($resul);
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
