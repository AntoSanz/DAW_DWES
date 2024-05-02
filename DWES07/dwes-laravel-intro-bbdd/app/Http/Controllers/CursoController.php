<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return view('cursos.IndexView');
    }
    public function create()
    {
        return view('cursos.CreateView');
    }
    public function show($curso, $tema = null)
    {
        // return view('cursos.ShowView', ['curso' => $curso]);
        return view('cursos.ShowView',compact('curso'));

        //Si a la ruta se le proporciona el tema, mostrará el primer mensaje
        //Si a la ruta no se le proporciona el tema, mostrará el segundo mensaje
        // if ($tema) {
        //     return "Bienvenido al curso  $curso, tema $tema";
        // } else {
        //     return "Bienvenido al curso  $curso";
        // }
    }
}
