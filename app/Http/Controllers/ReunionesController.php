<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Reunion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReunionesController extends Controller
{
    public function show()
    {
        $tiempo = Carbon::now()->format('d/m/Y'); // Variable que almacena la fecha en dicho formato
        return(view('reuniones.show', ['fecha' => $tiempo]));
    }
        public function create(Request $request)
    {
        $arr = array();
        $num = 1;
        while(trim($request->input('asistente' . $num))) { // Este while nos permite recorrer el array.
            // En caso de que no haya más variables este bucle para.
            if(!$this->buscarUsuario(trim($request->input('asistente' . $num)))) {
                return view("reuniones.fallo", ["asisNoEnc" => trim($request->input('asistente' . $num))]);
            }



            $arr[$num - 1] = $this->buscarNombre(trim($request->input('asistente' . $num)));


            $num++;
        }

        //return implode(',', $arr) . "," . Carbon::now()->format('d/m/Y') . "," . $request->input('selectTipoReunion') . " " . $request->input('textArea') . " " . $request->input('aspectos');
        //return $this->buscarNombre("zsawayn@example.net");

        //return $this->buscarIDPorEmail(trim($request->input('asistente1')));

        $reunion = new Reunion;

        $reunion->fecha = Carbon::now();

        $reunion->tipo_lugar = $request->input('selectTipoReunion');

        $reunion->objetivos = $request->input('textArea');

        $reunion->aspectos = $request->input('aspectos');

        $reunion->convocante_id = $this->buscarIDPorEmail(trim($request->input('asistente1')));

        $reunion->asistentes = implode(", ", $arr);

        $reunion->save();

        return view('reuniones.mandar', ['array' => $arr, 'fecha' => Carbon::now()->format('d/m/Y'), 'textArea' => $request->input('textArea'), 'aspectos' => $request->input('aspectos')]);
    }


    function obtenerReuniones() {
        $reuniones = new Reunion;

        $resul = $reuniones::select('fecha', 'tipo_lugar', 'objetivos', 'aspectos', 'asistentes')->get();

        return json_encode($resul);
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

    function buscarIDPorEmail($email) {
        $usuario = new User;

        $idPersona = $usuario::select('id_persona')->where('email', $email)->get();

        $personas = new Persona;

        $id = $personas::select('id')->where('id', $idPersona[0]->id_persona)->get();

        return $id[0]->id;
    }
}

