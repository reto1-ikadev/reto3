<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){
        $empresas=[
                
            "1"=>"Mercedes",
       
            "2"=>"Michelin",
            "3"=>"Auria"
        ];

        return view('coordinador.index', ['empresas'=>$empresas, 'tipo'=>'empresa']);
    }
}
