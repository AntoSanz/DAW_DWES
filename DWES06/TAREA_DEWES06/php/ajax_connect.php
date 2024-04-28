<?php
require "./class/LibreriaPDO.php";
require "./class/Alumno.php";

$bbddname = "daw_dwes_06";
$DB = new DB($bbddname);

$alumno = new Alumno($bbddname);
$inputValue = isset($_GET['inputValue']) ? $_GET['inputValue'] : '';
$alumnos = $alumno->getAlumnosListFiltered($inputValue);
echo json_encode($alumnos);