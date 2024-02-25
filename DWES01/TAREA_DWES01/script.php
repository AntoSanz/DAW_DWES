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
    $archivo = 'alumnos.txt';

    // Crear el archivo si no existe y no se ha creado en el inicio o se ha borrado una vez se ha iniciado la pagina
    if (!file_exists($archivo)) {
        crearArchivo();
    }

    if ($dni == "") {
        echo "Introduce el DNI.</br>";
        showBackButton();
        return;
    }
    //Recorrer el archivo para comprobar si el alumno existe
    $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
    foreach ($lineas as $linea) {
        $alumnoExistente = explode(' ', $linea);
        if ($alumnoExistente[0] == $dni) {
            echo "El alumno con DNI $dni ya existe. </br>";
            showBackButton();
            return;
        }
    }

    // Guardar el nuevo alumno en el archivo
    $nuevaLinea = "$dni $nombre $apellido1 $apellido2 $telefono";
    file_put_contents($archivo, $nuevaLinea . PHP_EOL, FILE_APPEND);
    echo "Alumno guardado correctamente. </br>";
    showBackButton();
}

// Mostrar los alumnos en una tabla HTML
function mostrarAlumnos()
{
    $archivo = 'alumnos.txt';
    $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
    echo "<table border='1'>
                                <tr>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Apellido1</th>
                                    <th>Apellido2</th>
                                    <th>Telefono</th>
                                </tr>";
    foreach ($lineas as $linea) {
        $alumno = explode(' ', $linea);
        echo "<tr>";
        foreach ($alumno as $dato) {
            echo "<td>$dato</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    showBackButton();
}

    // Borrar al alumno con el DNI especificado
function borrarAlumnoPorDni($dni)
{
    $archivo = 'alumnos.txt';
    $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
    $nuevasLineas = [];
    $borrado = false;

    foreach ($lineas as $linea) {
        $alumno = explode(' ', $linea);
        if ($alumno[0] == $dni) {
            $borrado = true;
        } else {
            $nuevasLineas[] = $linea;
        }
    }

    if ($borrado) {
        file_put_contents($archivo, implode(PHP_EOL, $nuevasLineas));
        $nuevaLinea = "";
        file_put_contents($archivo, $nuevaLinea . PHP_EOL, FILE_APPEND);
        echo "Alumno con DNI $dni eliminado correctamente. </br>";
    } else {
        echo "No se encontró ningún alumno con el DNI $dni. </br>";
    }
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
