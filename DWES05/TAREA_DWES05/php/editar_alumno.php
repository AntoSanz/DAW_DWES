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

    echo    '<div class="form-floating mb-3">
                <input type="text" class="form-control" id="dni" name="dni" placeholder="" value="'. $alumnoData['Dni'] .'">
                <label for="dni">DNI</label>
            </div>';
    echo   '<div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" name="nombre" placeholder="" value="'. $alumnoData['Nombre'] .'">
                <label for="name">Nombre</label>
            </div>';
    echo    '<div class="form-floating mb-3">
                <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="" value="'. $alumnoData['Apellido1'] .'">
                <label for="apellido1">Primer apellido</label>
            </div>';
    echo    '<div class="form-floating mb-3">
                <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="" value="'. $alumnoData['Apellido2'] .'">
                <label for="apellido2">Segundo apellido</label>
            </div>';
    echo    '<div class="form-floating mb-3">
                <input type="number" class="form-control" id="edad" name="edad" placeholder="" value="'. $alumnoData['Edad'] .'">
                <label for="edad">Edad</label>
            </div>';
    echo    '<div class="form-floating mb-3">
                <input type="number" class="form-control" id="telefono" name="telefono" placeholder="" value="'. $alumnoData['Telefono'] .'">
                <label for="telefono">Telefono</label>
            </div>';
} else {
    echo '<p class="card-text">No se encontraron datos válidos para el alumno con DNI $dni</p>';
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Crear un nuevo objeto Alumno
    // $alumno = new Alumno("daw_dwes_05");

    // Obtener los datos del formulario
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];

    // Llamar al método createAlumno() para crear un nuevo usuario en la base de datos
    $alumno->updateAlumno($dni, $nombre, $apellido1, $apellido2, $edad, $telefono);
    
    header("Location: ../public/detalle.php?dni=" . $dni);
    // echo "<p></p>Redirigiendo al listado...</p>";
    // header("refresh:3;url=../public/listado.php");
}