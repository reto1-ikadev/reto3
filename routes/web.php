<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\TutorAcademicoController;
use App\Http\Controllers\TutorEmpresaController;

//Rutas del coordinador
Route::get('/cordinador', [CoordinadorController::class, 'index'])->name('coordinador.index');
Route::get('/coordinador/create',[CoordinadorController::class,'create'])->name('coordinador.create');
//Rutas de los estudiantes
Route::get('/estudiantes',[EstudianteController::class,'index'])->name('estudiantes.index');
Route::get('/estudiantes/{estudiante}',[EstudianteController::class,'show'])->name('estudiantes.show');
Route::get('/estudiantes/create',[EstudianteController::class,'create'])->name('estudiantes.create');

//Rutas de las empresas
Route::get('/empresas',[EmpresaController::class,'index'])->name('empresas.index');
Route::get('/empresas/create',[EmpresaController::class,'create'])->name('empresas.create');

//Rutas de los tutores academicos
Route::get('/tutoresAcademicos',[TutorAcademicoController::class,'index'])->name('tutoresAcademicos.index');
Route::get('/tutoresAcademicos/create',[TutorAcademicoController::class,'create'])->name('tutoresAcademicos.create');
//Rutas de los tutores de empresa
Route::get('/tutoresEmpresa',[TutorEmpresaController::class,'index'])->name('tutoresEmpresa.index');
Route::get('/tutoresEmpresa/create',[TutorEmpresaController::class,'create'])->name('tutoresEmpresa.create');
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

/*Auth::routes();*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

