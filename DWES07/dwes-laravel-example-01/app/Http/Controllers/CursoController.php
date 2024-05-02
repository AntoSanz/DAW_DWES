<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return 'Bienvenido a la pagina principal';
    }
    public function create()
    {
        return "En esta pagina podrás crear un curso";
    }
    public function show($curso, $tema = null)
    {
        //Si a la ruta se le proporciona el tema, mostrará el primer mensaje
        //Si a la ruta no se le proporciona el tema, mostrará el segundo mensaje
        if ($tema) {
            return "Bienvenido al curso  $curso, tema $tema";
        } else {
            return "Bienvenido al curso  $curso";
        }
    }
}
