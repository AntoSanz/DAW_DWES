<?php

use Illuminate\Support\Facades\Route;
// Añadir el controlador
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ListarController;

//Ruta con controlador
Route::get('/', HomeController::class);
Route::get('/listar', ListarController::class);

//Grupo de rutas
Route::controller(CursoController::class)->group(function(){
    Route::get('cursos', 'index');
    Route::get('cursos/create', 'create');
    Route::get('cursos/{curso}/{tema?}', 'show');
});

