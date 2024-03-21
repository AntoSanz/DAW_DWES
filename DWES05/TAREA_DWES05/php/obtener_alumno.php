<?php
spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

// Crear la clase DB con el nombre de la base de datos correspondiente
$bbddname = "daw_dwes_05";
$DB = new DB($bbddname);

// Crear una instancia de la clase Alumno
$alumno = new Alumno($bbddname);

// Obtener el DNI del alumno de la URL
$dni = $_GET['dni'];
// Llamar al método para obtener los datos del alumno
$alumnoData = $alumno->getAlumnoByDni($dni);
// var_dump($alumnoData);

// Verificar si se encontró al alumno
if ($alumnoData) {
    // Mostrar los datos del alumno
    // echo "<h2>Datos del alumno con DNI $dni</h2>";
    echo '<p class="card-text"><strong>DNI:</strong> ' . $alumnoData['Dni'] . '</p>';
    echo '<p class="card-text"><strong>Nombre:</strong> ' . $alumnoData['Nombre'] . '</p>';
    echo '<p class="card-text"><strong>Apellido1:</strong> ' . $alumnoData['Apellido1'] . '</p>';
    echo '<p class="card-text"><strong>Apellido2:</strong> ' . $alumnoData['Apellido2'] . '</p>';
    echo '<p class="card-text"><strong>Edad:</strong> ' . $alumnoData['Edad'] . '</p>';
    echo '<p class="card-text"><strong>Telefono:</strong> ' . $alumnoData['Telefono'] . '</p>';
} else {
    echo '<p class="card-text">No se encontraron datos válidos para el alumno con DNI $dni</p>';
}
?>
