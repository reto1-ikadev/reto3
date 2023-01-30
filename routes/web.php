<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\TutorAcademicoController;
use App\Http\Controllers\TutorEmpresaController;
use App\Http\Controllers\CustomAuthController;

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
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

//Deshabilitamos el registro.
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
