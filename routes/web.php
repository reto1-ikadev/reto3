<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\TutorAcademicoController;
use App\Http\Controllers\TutorEmpresaController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\QueryController;
//Controlador para developing
use App\Http\Controllers\CredencialesUsuarioController;

//Rutas del coordinador
Route::get('/cordinador', [CoordinadorController::class, 'index'])->name('coordinador.index');
Route::get('/coordinador/create',[CoordinadorController::class,'create'])->name('coordinador.create');
//Rutas de los estudiantes
Route::get('/estudiantes',[AlumnoController::class,'index'])->name('estudiantes.index');
Route::get('/estudiantes/detalle/{estudiante}',[AlumnoController::class,'show'])->name('estudiantes.show');
Route::get('/estudiantes/create',[AlumnoController::class,'create'])->name('estudiantes.create');

//Rutas de las empresas
Route::get('/empresas',[EmpresasController::class,'index'])->name('empresas.index');
Route::get('/empresas/create',[EmpresasController::class,'create'])->name('empresas.create');

//Rutas de los tutores academicos
Route::get('/tutoresAcademicos',[TutorAcademicoController::class,'index'])->name('tutoresAcademicos.index');
Route::get('/tutoresAcademicos/create',[TutorAcademicoController::class,'create'])->name('tutoresAcademicos.create');
//Rutas de los tutores de empresa
Route::get('/tutoresEmpresa',[TutorEmpresaController::class,'index'])->name('tutoresEmpresa.index');
Route::get('/tutoresEmpresa/create',[TutorEmpresaController::class,'create'])->name('tutoresEmpresa.create');

//Indicamos en que blade se dirigira el login después de iniciar sesión.
Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

//Deshabilitamos el registro.
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Route::middleware(['auth', 'can:tutor_academico'])->group(function() {
    Route::get('/alumnos', function() {
        return "Hola";
    });
});

Route::get('/tutores', function() {
    return "Hola tutores";
})->middleware(['auth', 'can:tutores']);

*/

// Ruta que nos permite comprobar y saber que clase de usuario a iniciado sesión.
//Route::get('/dirigir', [CredencialesUsuarioController::class, 'dirigir'])->name('dirigir');

/*

---------------- Rutas para SOLO desarrollo -----------------------

Route::get('/listar', [QueryController::class, 'index'])->name('peticiones');
Route::get('/listar/{id}', [QueryController::class, 'insertar'])->name('peticionesconid');
Route::get('/crear', [QueryController::class, 'crearNuevo'])->name('crear');

Route::get('/dirigir', [CredencialesUsuarioController::class, 'dirigir'])->name('dirigir');

-------------------------------------------------------------------

*/

// Ruta para developing
Route::get('/dirigir', [CredencialesUsuarioController::class, 'dirigir'])->name('dirigir');
