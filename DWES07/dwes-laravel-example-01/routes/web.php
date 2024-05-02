<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cursos', function () {
    return 'Bienvenido a la pagina principal de cursos';
});