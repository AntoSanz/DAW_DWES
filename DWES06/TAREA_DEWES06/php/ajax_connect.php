<?php

// Incluir el archivo que contiene la definición de la clase Alumno
// spl_autoload_register(function ($class) {
//     require "./class/" . $class . ".php";
// });
require "./class/LibreriaPDO.php";
require "./class/Alumno.php";

// echo "LLEGA AL PHP";

$bbddname = "daw_dwes_06";
$DB = new DB($bbddname);

// Crear una instancia de la clase Alumno
$alumno = new Alumno($bbddname); // Asegúrate de pasar la conexión a la base de datos como parámetro

$inputValue = isset($_GET['inputValue']) ? $_GET['inputValue'] : '';
// var_dump($inputValue);

// Obtener la lista de alumnos
$alumnos = $alumno->getAlumnosListFiltered($inputValue);

// Devolver la lista de alumnos en formato JSON
echo json_encode($alumnos);