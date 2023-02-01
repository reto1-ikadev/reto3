<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CuadernoPracticasController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\TutorAcademicoController;
use App\Http\Controllers\TutorEmpresaController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\QueryController;
//Controlador para developing
use App\Http\Controllers\CredencialesUsuarioController;

//Rutas de los grados
Route::get('/grados/index',[GradoController::class,'index'])->name('grados.index');
//Rutas de los cursos
Route::get('/cursos/index',[CursoController::class,'index'])->name('cursos.index');
//Rutas de las personas
Route::get('/personas/index',[PersonasController::class,'index'])->name('personas.index');
Route::post('/personas/store',[PersonasController::class,'store'])->name('personas.store');
Route::get('/personas/store',[PersonasController::class,'store'])->name('personas.store');
//Rutas del coordinador
Route::get('/cordinador', [CoordinadorController::class, 'index'])->name('coordinador.index');
Route::get('/coordinador/create',[CoordinadorController::class,'create'])->name('coordinador.create');
//Rutas de los estudiantes
Route::get('/estudiantes/index',[AlumnoController::class,'index'])->name('estudiantes.index');
Route::get('/estudiantes/detalle/{id}',[AlumnoController::class,'show'])->name('estudiantes.detalle')->where('id','[0-9]+');
Route::get('/estudiantes/create',[AlumnoController::class,'create'])->name('estudiantes.create');
Route::get('/estudiantes/filtrar',[AlumnoController::class,'selectAllAlumnos'])->name('estudiantes.filtrar');
Route::post('/estudiantes/store',[AlumnoController::class,'store'])->name('estudiantes.store');
Route::get('/estudiantes/store',[AlumnoController::class,'store'])->name('estudiantes.store');

//Rutas de las empresas
Route::get('/empresas/index',[EmpresasController::class,'index'])->name('empresas.index');
Route::get('/empresas/create',[EmpresasController::class,'create'])->name('empresas.create');
Route::post('/empresas/store',[EmpresasController::class,'store'])->name('empresas.store');
Route::get('/empresas/store',[EmpresasController::class,'store'])->name('empresas.store');
//Rutas del diario
Route::get('/diario',[CuadernoPracticasController::class,'show'])->name('diario.show');
//Rutas de las reuniones
Route::get('/reunion',[CursoController::class,'show'])->name('reunion.show');
//Rutas de los tutores academicos
Route::get('/tutoresAcademicos/index',[TutorAcademicoController::class,'index'])->name('tutoresAcademicos.index');
Route::get('/tutoresAcademicos/create',[TutorAcademicoController::class,'create'])->name('tutoresAcademicos.create');
//Rutas de los tutores de empresa
Route::get('/tutoresEmpresa/index',[TutorEmpresaController::class,'index'])->name('tutoresEmpresa.index');
Route::get('/tutoresEmpresa/create',[TutorEmpresaController::class,'create'])->name('tutoresEmpresa.create');

//Indicamos en que blade se dirigira el login después de iniciar sesión.
Route::get('/', function () {
    return view('coordinador.index');
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
