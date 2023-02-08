<?php

namespace App\Http\Controllers;

use App\Mail\NuevoUsuario;
use App\Models\User;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
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
        $usuario = new User();
        $ide_usuario = Persona::select('id')->latest()->first();

        $usuario->id_persona = $ide_usuario->id;
        $usuario->email = request('email');
        $contraseña = md5(random_bytes(10));
        $usuario->password = Hash::make($contraseña);

        $usuario->save();
        Mail::to($usuario->email)->send(new NuevoUsuario(['email'=>$usuario->email, 'contraseña'=>$contraseña]));

        return true;
    }

}
