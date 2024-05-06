<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno; // Importa el modelo Alumno

class AlumnoController extends Controller
{
    public function listarAlumnos()
    {
        $alumnos = Alumno::all(); // Obtener todos los registros de la tabla 'alumnos'

        return view('ListarView', ['alumnos' => $alumnos]);
    }
}
