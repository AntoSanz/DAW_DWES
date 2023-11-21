<?php

//Funcion para crear el archivo alumnos.txt si no existe
function crearArchivo()
{
    $archivo = 'alumnos.txt';
    if (!file_exists($archivo)) {
        touch($archivo);
    }
}

function showBackButton()
{
    echo "<a href=\"index.php\" class=\"button\">Volver</a>";
}

//Funcion para guardar un alumno
//Si el alumno existe, no lo creará
function guardarAlumno($dni, $nombre, $apellido1, $apellido2, $telefono)
{

    showBackButton();
}

// Mostrar los alumnos en una tabla HTML
function mostrarAlumnos()
{


    showBackButton();
}

// Borrar al alumno con el DNI especificado
function borrarAlumnoPorDni($dni)
{

    showBackButton();
}

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$telefono = $_POST['telefono'];

//Cada inicio se comprueba si existe el archivo, y si no, lo crea
crearArchivo();

//Funcionalidad de los botones
if (isset($_POST['guardar'])) {
    //Se presionó el botón "Guardar"
    guardarAlumno($dni, $nombre, $apellido1, $apellido2, $telefono);
}
if (isset($_POST['mostrar'])) {
    //Se presionó el botón "Mostrar"
    mostrarAlumnos();
}
if (isset($_POST['borrar'])) {
    //Se presionó el botón "Borrar"
    $dni_a_borrar = $_POST['dni']; // Asegúrate de obtener el DNI a borrar desde el formulario
    borrarAlumnoPorDni($dni_a_borrar);
}
