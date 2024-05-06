<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno; // Importa el modelo Alumno

class AlumnoController extends Controller
{
    public function index()
    {
        return view('alumnos.IndexView');
    }

    public function listarAlumnos()
    {
        $alumnos = Alumno::all(); // Obtener todos los registros de la tabla 'alumnos'

        return view('alumnos.listarView', ['alumnos' => $alumnos]);
    }

    public function mostrarFormularioCrear()
    {
        return view('alumnos.crearView');
    }

    public function crearAlumno(Request $request)
    {
        //  return $request;

        //Crear el objeto alumno
        $alumno = new Alumno();
        $alumno->DNI = $request->dni;
        $alumno->Nombre = $request->nombre;
        $alumno->Apellido1 = $request->apellido1;
        $alumno->Apellido2 = $request->apellido2;

        //Guardar en la base de datos
        $alumno->save();

        // // Redirigir a una página de éxito o a otra vista
        return redirect('/alumnos/listar')->with('success', 'Alumno creado correctamente');
    }

    public function mostrarFormularioEditar($dni)
    {

        // Aquí puedes implementar la lógica para mostrar el formulario de edición o realizar otras acciones
        $alumno = Alumno::find($dni);
        // return $alumno;
        return view('alumnos.editarView', compact('alumno'));
    }

    public function actualizarAlumno(Alumno $alumno, Request $request)
    {
        // return $alumno;
        // return $request -> all();
        $alumno -> Dni = $request -> dni;
        $alumno -> Nombre = $request -> nombre;
        $alumno -> Apellido1 = $request -> apellido1;
        $alumno -> Apellido1 = $request -> apellido2;
        $alumno->save();
        return redirect('/alumnos/listar')->with('success', 'Alumno actualizado correctamente');

    }
}
