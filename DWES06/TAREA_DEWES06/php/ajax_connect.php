<?php
// Incluir las clases necesarias para el manejo de la base de datos y la entidad Alumno
require "./class/LibreriaPDO.php";
require "./class/Alumno.php";

// Nombre de la base de datos
$bbddname = "daw_dwes_06";

// Crear una instancia de la conexión a la base de datos
$DB = new DB($bbddname);

// Crear una instancia de la entidad Alumno, pasando la conexión a la base de datos como parámetro
$alumno = new Alumno($bbddname);

// Obtener el valor del parámetro 'inputValue' enviado a través de la solicitud GET,
// Si no se pasa ningun dato, inputValue es una cadena vacía
$inputValue = isset($_GET['inputValue']) ? $_GET['inputValue'] : '';

// Obtener la lista de alumnos filtrada según el valor de 'inputValue'
$alumnos = $alumno->getAlumnosListFiltered($inputValue);

// Codificar la lista de alumnos en formato JSON y enviarla como respuesta
echo json_encode($alumnos);
