<?php
spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Crear un nuevo objeto Alumno
    $alumno = new Alumno("daw_dwes_05");

    // Obtener los datos del formulario
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];

    // Llamar al método createAlumno() para crear un nuevo usuario en la base de datos
    $alumno->createAlumno($dni, $nombre, $apellido1, $apellido2, $edad, $telefono);
    
    echo "<p></p>Redirigiendo al listado...</p>";
    header("refresh:3;url=../public/listado.php");
}
?>
