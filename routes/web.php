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
Route::get('/estudiantes',[AlumnoController::class,'index'])->name('estudiantes.index');
Route::get('/estudiantes/detalle/{estudiante}',[AlumnoController::class,'show'])->name('estudiantes.show');
Route::get('/estudiantes/create',[AlumnoController::class,'create'])->name('estudiantes.create');
Route::get('/estudiantes/filtrar',[AlumnoController::class,'selectAllAlumnos'])->name('estudiantes.filtrar');
Route::post('/estudiantes/store',[AlumnoController::class,'store'])->name('estudiantes.store');
Route::get('/estudiantes/store',[AlumnoController::class,'store'])->name('estudiantes.store');

//Rutas de las empresas
Route::get('/empresas/index',[EmpresasController::class,'index'])->name('empresas.index');
Route::get('/empresas/create',[EmpresasController::class,'create'])->name('empresas.create');
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
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
