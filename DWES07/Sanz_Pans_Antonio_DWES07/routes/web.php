<?php

use Illuminate\Support\Facades\Route;
// Añadir el controlador
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlumnoController;

//Ruta con controlador
Route::get('/', HomeController::class);
Route::get('/welcome', HomeController::class);

//Grupo de rutas
Route::controller(CursoController::class)->group(function(){
    Route::get('cursos', 'index');
    Route::get('cursos/create', 'create');
    Route::get('cursos/{curso}/{tema?}', 'show');
});

Route::controller(AlumnoController::class)->group(function(){
    Route::get('alumnos', 'index');
    Route::get('alumnos/listar', [AlumnoController::class, 'listarAlumnos']) -> name('alumnos.listar');

    //Crear Alumno
    Route::get('alumnos/crear', [AlumnoController::class, 'mostrarFormularioCrear']) -> name('alumnos.crear'); //Formulario de crear
    Route::post('alumnos', [AlumnoController::class, 'crearAlumno']) -> name('alumnos.guardar'); //Ruta para crear Alumno

    //Editar Alumno
    Route::get('alumnos/{dni}/editar', [AlumnoController::class, 'mostrarFormularioEditar']) -> name('alumnos.editar');
    Route::put('alumnos/{alumno}', [AlumnoController::class, 'actualizarAlumno']) -> name('alumnos.actualizar');
});