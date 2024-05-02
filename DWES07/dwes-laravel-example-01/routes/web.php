<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cursos', function () {
    return 'Bienvenido a la pagina principal de cursos';
});


Route::get('cursos/{curso}/{tema?}', function ($curso, $tema = null) {
    //Si a la ruta se le proporciona el tema, mostrará el primer mensaje
    //Si a la ruta no se le proporciona el tema, mostrará el segundo mensaje
    if ($tema) {
        return "Bienvenido al curso  $curso, tema $tema";
    } else {
        return "Bienvenido al curso  $curso";
    }
});