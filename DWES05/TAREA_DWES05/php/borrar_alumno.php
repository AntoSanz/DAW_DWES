<?php
// Incluir la clase Alumno
require "../class/Alumno.php";

// Verificar si se recibió la solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió el DNI del alumno a borrar
    if (isset($_POST['dni_alumno'])) {
        // Crear una instancia de la clase Alumno
        $alumno = new Alumno($bbddname);

        // Obtener el DNI del alumno a borrar
        $dni_alumno = $_POST['dni_alumno'];

        // Intentar borrar el alumno
        $alumno->deleteAlumno($dni_alumno);

        // Redirigir a la página de listado después de borrar el alumno
        header("Location: listado.php");
        exit();
    } else {
        // Mostrar un mensaje de error si no se recibió el DNI del alumno
        echo "No se recibió el DNI del alumno a borrar.";
    }
}
?>
