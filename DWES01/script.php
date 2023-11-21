<?php

//Funcion para crear el archivo alumnos.txt si no existe
function crearArchivo()
{
    $archivo = 'alumnos.txt';
    if (!file_exists($archivo)) {
        touch($archivo);
    }
}