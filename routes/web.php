<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\TutorAcademicoController;
use App\Http\Controllers\TutorEmpresaController;

//Rutas del coordinador
Route::get('/', [CoordinadorController::class, 'index'])->name('coordinador.index');

//Rutas de los estudiantes
Route::get('/estudiantes',[EstudianteController::class,'index'])->name('estudiantes.index');
Route::get('/estudiantes/{estudiante}',[EstudianteController::class,'show'])->name('estudiantes.show');

//Rutas de las empresas
Route::get('/empresas',[EmpresaController::class,'index'])->name('empresas.index');

//Rutas de los tutores academicos
Route::get('/tutoresAcademicos',[TutorAcademicoController::class,'index'])->name('tutoresAcademicos.index');

//Rutas de los tutores de empresa
Route::get('/tutoresEmpresa',[TutorEmpresaController::class,'index'])->name('tutoresEmpresa.index');
