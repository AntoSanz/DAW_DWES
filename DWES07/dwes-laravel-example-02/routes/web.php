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


// Route::get('/', function () {
//     return view('welcome');
// });



// Route::get('dwes', function () {
//     return 'Bienvenido a la pagina DWES';
// });

// // Route::get('ruta-con-variable/{variable}', function ($variable){
// //     return "Bienvenido a $variable";
// // });

// Route::get('ruta-con-variable/{curso}/{tema?}', function ($curso, $tema = null) {
//     //Si a la ruta se le proporciona el tema, mostrará el primer mensaje
//     //Si a la ruta no se le proporciona el tema, mostrará el segundo mensaje
//     if ($tema) {
//         return "Bienvenido al curso  $curso, tema $tema";
//     } else {
//         return "Bienvenido al curso  $curso";
//     }
// });
