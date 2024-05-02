<?php

use Illuminate\Support\Facades\Route;
// Añadir el controlador
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;

//Ruta con controlador
Route::get('/', HomeController::class);
Route::get('cursos', [CursoController::class, 'index']);
Route::get('cursos/create', [CursoController::class, 'create']);
Route::get('cursos/{curso}/{tema?}', [CursoController::class, 'show']);
