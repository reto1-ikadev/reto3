<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\ReunionesController;
use App\Mail\NuevoUsuario;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoordinadorController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AnosAcademicosController;
use App\Http\Controllers\CuadernoPracticasController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GradoController;

use App\Http\Controllers\PersonasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TutorAcademicoController;
use App\Http\Controllers\TutorEmpresaController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CalificacionesHistorialController;
use App\Http\Controllers\QueryController;
//Controlador para developing
use App\Http\Controllers\CredencialesUsuarioController;
use App\Http\Controllers\GradoCoordinadorController;
use App\Models\AnosAcademicos;
use App\Models\CalificacionesHistorial;

Route::middleware(['auth'])->group( function (){
    Route::get('/grados/index',[GradoController::class,'index'])->name('grados.index');
//Rutas de los cursos
    Route::get('/cursos/index',[CursoController::class,'index'])->name('cursos.index');
//Rutas de los usuarios
    Route::post('/user/store',[UserController::class,'store'])->name('user.store');
    Route::get('/user/store',[UserController::class,'store'])->name('user.store');
//Rutas de los años
    Route::get('/anyo/create',[AnosAcademicosController::class,'create'])->name('anyo.create');
    Route::post('/anyo/store',[AnosAcademicosController::class,'store'])->name('anyo.store');
    Route::get('/anyo/store',[AnosAcademicosController::class,'store'])->name('anyo.store');
//Rutas de las personas
    Route::get('/personas/show/{tipo}', [PersonasController::class, 'show'])->name('personas.show');
    Route::get('/personas/index',[PersonasController::class,'index'])->name('personas.index');
    Route::post('/personas/store',[PersonasController::class,'store'])->name('personas.store');
    Route::get('/personas/store',[PersonasController::class,'store'])->name('personas.store');
    Route::get('/personas/tutorLibre/{tipo}',[PersonasController::class,'tutorLibre'])->name('personas.tutorLibre');
    //Rutas del coordinador

    Route::get('/coordinador/create',[CoordinadorController::class,'create'])->name('coordinador.create');
//Rutas de los estudiantes
    Route::get('/', [InicioController::class, 'index'])->name('inicio.index');

Route::middleware(['auth', 'can:alumno'])->group( function() {
    Route::post('/diarioGuardar', [CuadernoPracticasController::class, 'store'])->name('diario.store');
    Route::get('/verDiario', [CuadernoPracticasController::class, 'show'])->name('diario.show');

});
        Route::middleware(['auth', 'can:tutores'])->group( function() {
        Route::get('/estudiantes/index', [AlumnoController::class, 'index'])->name('estudiantes.index');
        Route::get('/estudiantes/detalle/{id}', [AlumnoController::class, 'show'])->name('estudiantes.detalle')->where('id', '[0-9]+');
        Route::get('/estudiantes/create', [AlumnoController::class, 'create'])->name('estudiantes.create');
        Route::get('/estudiantes/filtrar', [AlumnoController::class, 'selectAllAlumnos'])->name('estudiantes.filtrar');
        Route::get('/misestudiantes/index', [TutorAcademicoController::class, 'index'])->name('misestudiantes.index');
        Route::get('/misestudiantes/filtrar', [TutorAcademicoController::class, 'selectAllAlumnosIdTutor'])->name('misestudiantes.filtrar');

        Route::post('/estudiantes/store', [AlumnoController::class, 'store'])->name('estudiantes.store');
        Route::get('/estudiantes/store', [AlumnoController::class, 'store'])->name('estudiantes.store');
        Route::get('/cordinador', [CoordinadorController::class, 'index'])->name('coordinador.index');
        Route::put('estudiantes/{estudiante}',[AlumnoController::class,'update'])->name('estudiantes.update');
    });
//Rutas de las empresas
    Route::get('/empresas/index',[EmpresasController::class,'index'])->name('empresas.index');
    Route::get('/empresas/index/combo',[EmpresasController::class,'indexCombo'])->name('empresas.indexCombo');
    Route::get('/empresas/create',[EmpresasController::class,'create'])->name('empresas.create');
    Route::get('/empresas/filtrar', [EmpresasController::class, 'selectAllEmpresas'])->name('empresas.filtrar');
    Route::post('/empresas/store',[EmpresasController::class,'store'])->name('empresas.store');
    Route::get('/empresas/store',[EmpresasController::class,'store'])->name('empresas.store');
    Route::put('/empresas/update',[EmpresasController::class,'update'])->name('empresas.update');
//Rutas del diario

    Route::get('/diario/{id}',[CuadernoPracticasController::class, 'create'])->name('diario.create');
    Route::get('/diariosObtener', [CuadernoPracticasController::class, 'obtenerDiarios'])->name('diarios.obtener');
//Rutas de las reuniones
    Route::get('/reunion',[ReunionesController::class,'show'])->name('reunion.show');
    Route::post('/crear_reunion',[ReunionesController::class,'create'])->name('reunion.create');
    Route::get('/reunionesObtener', [ReunionesController::class, 'obtenerReuniones'])->name('reuniones.obtener');
//Rutas de clasificaciones_historial
Route::get('/calificacionesHistorial/create/{estudiante}',[CalificacionesHistorialController::class,'create'])->name('calificacionesHistorial.create');
Route::post('/calificacionesHistorial/store',[CalificacionesHistorialController::class,'store'])->name('calificacionesHistorial.store');
Route::get('/calificacionesHistorial/store',[CalificacionesHistorialController::class,'store'])->name('calificacionesHistorial.store');
Route::get('/calificacionesHistorial/index',[CalificacionesHistorialController::class,'index'])->name('calificacionesHistorial.index');
//Rutas de los tutores academicos
Route::get('/tutoresAcademicos/index',[TutorAcademicoController::class,'index'])->name('tutoresAcademicos.index');
Route::get('/tutoresAcademicos/create',[TutorAcademicoController::class,'create'])->name('tutoresAcademicos.create');
Route::post('/tutoresAcademicos/create',[TutorAcademicoController::class,'create'])->name('tutoresAcademicos.create');
Route::post('/tutoresAcademicos/store',[TutorAcademicoController::class,'store'])->name('tutoresAcademicos.store');
Route::get('/tutoresAcademicos/store',[TutorAcademicoController::class,'store'])->name('tutoresAcademicos.store');
Route::get('/tutoresAcademicos/show',[TutorAcademicoController::class,'show'])->name('tutoresAcademicos.show');
Route::get('/tutoresAcademicos/filtrar',[TutorAcademicoController::class,'selectAllTutores'])->name('tutoresAcademicos.filtrar');
Route::put('/tutoresAcademicos/update',[TutorAcademicoController::class,'update'])->name('tutoresAcademicos.update');
//Rutas de los tutores de empresa
Route::get('/tutoresEmpresa/index',[TutorEmpresaController::class,'index'])->name('tutoresEmpresa.index');
Route::get('/tutoresEmpresa/create',[TutorEmpresaController::class,'create'])->name('tutoresEmpresa.create');
Route::post('/tutoresEmpresa/store',[TutorEmpresaController::class,'store'])->name('tutoresEmpresa.store');
Route::get('/tutoresEmpresa/filtrar', [TutorEmpresaController::class, 'selectAllTutoresEmpresas'])->name('tutoresEmpresa.filtrar');
Route::get('/tutoresEmpresa/store',[TutorEmpresaController::class,'store'])->name('tutoresEmpresa.store');
Route::put('/tutoresEmpresa/update',[TutorEmpresaController::class,'update'])->name('tutoresEmpresa.update');
//Indicamos en que blade se dirigira el login después de iniciar sesión.

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

});
//Rutas de los grados
Route::get('/grado/create',[GradoController::class,'create'])->name('grado.create');
Route::post('/grado/store',[GradoController::class,'store'])->name('grado.store');
Route::get('/grado/store',[GradoController::class,'store'])->name('grado.store');
//Rutas del historial
Route::get('historial/{estudiante}',[CalificacionesHistorialController::class,'show'])->name('historial.show');
//Rutas de los gradosCoordinadores
Route::post('/gradoCoordinadores/store',[GradoCoordinadorController::class,'store'])->name('gradoCoordinadores.store');
Route::get('/gradoCoordinadores/store',[GradoCoordinadorController::class,'store'])->name('gradoCoordinadores.store');
//Deshabilitamos el registro.
Auth::routes(['register' => false]);



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
//Route::get('/dirigir', [CredencialesUsuarioController::class, 'dirigir'])->name('dirigir');
