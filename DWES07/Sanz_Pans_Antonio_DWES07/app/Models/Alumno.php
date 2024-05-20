<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'DNI'; // Especificar el campo DNI como clave primaria
    public $timestamps = false; // Deshabilitar el manejo automático de timestamps (Created_at y updated_at)

}
