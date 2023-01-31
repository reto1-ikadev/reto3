<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReunionesController extends Controller
{
    public function show()
    {
        return(view('reuniones.show'));
    }
}
