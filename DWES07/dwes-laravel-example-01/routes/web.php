<?php

use Illuminate\Support\Facades\Route;
// Añadir el controlador
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;

//Ruta con controlador
Route::get('/', HomeController::class);

//Grupo de rutas
Route::controller(CursoController::class)->group(function(){
    Route::get('cursos', 'index');
    Route::get('cursos/create', 'create');
    Route::get('cursos/{curso}/{tema?}', 'show');
});
