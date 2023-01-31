<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index(Request $request) {
        $users = DB::table('users')->get();

        return view('peticiones.index', ['users' => json_decode($users, true)]);
    }

    public function insertar($id) {
        //$user = DB::table('users')->where('id', $id)->first();
        $user = DB::table('users')->where('id', $id)->value('id');
        $tipo = DB::table('personas')->where('id', $user)->value('tipo');
        return view('peticiones.index', ['tipo' => $tipo]);
    }

    public function crearNuevo() {
        DB::table('users')->insert([
            'email' => 'adrian@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'id_persona' => 1
        ]);
    }
}
