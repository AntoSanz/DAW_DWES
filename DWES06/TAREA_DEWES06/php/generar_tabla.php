<?php
// Recibir los datos enviados desde JavaScript
$inputData = json_decode(file_get_contents('php://input'), true);

// Crear la tabla HTML utilizando los datos recibidos
$tableHTML = '<table class="table">';
$tableHTML .= '<thead><tr><th>DNI</th><th>Nombre</th></tr></thead>';
$tableHTML .= '<tbody>';

foreach ($inputData as $alumno) {
    $tableHTML .= "<tr><td>{$alumno['Dni']}</td><td>{$alumno['Nombre']}</td></tr>";
}

$tableHTML .= '</tbody>';
$tableHTML .= '</table>';

// Devolver la tabla HTML generada
echo $tableHTML;
?>
