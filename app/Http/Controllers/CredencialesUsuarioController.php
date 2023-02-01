<?php
//Este controlador es para desarrollo unicamente.


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CredencialesUsuarioController extends Controller
{
    // Guardamos esta variable estatica para poder obtene el tipo de usuario en caso de necesidad.
    static $tipoUsuario;

    public function dirigir() {
        // Con la funcion auth() podemos obtener información sobre el usuario loggeado.
        $userID = DB::table('users')->where('id', auth()->user()->id)->value('id');
        self::$tipoUsuario = DB::table('personas')->where('id', $userID)->value('tipo');

        /*
        switch(self::$tipoUsuario) {
            case 'tutor_academico': {
                return redirect('/tutoresAcademicos');
                break;
            }
            case 'tutor_empresa': {
                return redirect('/tutoresEmpresa');
                break;
            }
            default: {
                //No debería acceder aquí ya que siempre debería a ver un dato.
                break;
            }
        }*/
        return view('peticiones.index', ['tipo' => self::$tipoUsuario]);
    }
}
