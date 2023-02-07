<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
// Clase que nos permite obtener la fecha
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Persona;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        $resultado = ['sucess' => true, "data" => $cursos];
        return $resultado;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $arr = array();
        $num = 1;
        while(trim($request->input('asistente' . $num))) { // Este while nos permite recorrer el array.
                                                    // En caso de que no haya más variables este bucle para.
            if(!$this->buscarUsuario(trim($request->input('asistente' . $num)))) {
                return "No existe el asistente especificado: " . trim($request->input('asistente' . $num));
            }
            

            if($request->input('selectTipoReunion') === 'presencial') {
                $arr[$num - 1] = $this->buscarNombre(trim($request->input('asistente' . $num)));
            } else if($request->input('selectTipoReunion') === 'llamada') {
                $arr[$num - 1] = $this->buscarTelefono(trim($request->input('asistente' . $num)));
            }
            
            $num++;
        }

        //------------------------------------TO-DO-------------------------------------
            //En estas lineas de código programare el envio de correos con el controlador EmailController.

        //------------------------------------------------------------------------------

        //return implode(',', $arr) . "," . Carbon::now()->format('d/m/Y') . "," . $request->input('selectTipoReunion') . " " . $request->input('textArea') . " " . $request->input('aspectos');
        //return $this->buscarNombre("zsawayn@example.net");

        

        return view('reuniones.mandar', ['array' => $arr, 'fecha' => Carbon::now()->format('d/m/Y'), 'textArea' => $request->input('textArea'), 'aspectos' => $request->input('aspectos')]);
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
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        $tiempo = Carbon::now()->format('d/m/Y'); // Variable que almacena la fecha en dicho formato
        return(view('reuniones.show', ['fecha' => $tiempo]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }

    function buscarUsuario($email) {
        $usuario = new User;

        $resul = $usuario::select('id_persona')->where('email', $email)->get()->first;
        
        return $resul->id_persona;
        //return DB::table('users')->where('email', $email)->value('id_persona');
    }

    function buscarNombre($email) {
        //$idPersona = DB::table('users')->where('email', $email)->value('id_persona');

        $usuario = new User;

        $resul = $usuario::select('id_persona')->where('email', $email)->get();

        $personas = new Persona;

        $nombre = $personas::select('nombre')->where('id', $resul[0]->id_persona)->get();

        return $nombre[0]->nombre;

        //return DB::table('personas')->where('id', $idPersona)->value('nombre');
    }

    function buscarTelefono($email) {
        //$idPersona = DB::table('users')->where('email', $email)->value('id_persona');

        $usuario = new User;

        $resul = $usuario::select('id_persona')->where('email', $email)->get();

        $personas = new Persona;

        $telefono = $personas::select('telefono')->where('id', $resul[0]->id_persona)->get();

        return $telefono[0]->telefono;

        //return DB::table('personas')->where('id', $idPersona)->value('telefono');
    }
}
