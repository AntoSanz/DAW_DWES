<?php
$connect = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');

//Preparar y ejecutar una consulta que inserta un nuevo registro en la tabla familia
$stmt = $connect->stmt_init();

$stmt->prepare('INSERT INTO familias (cod, nombre) VALUES (?, ?)');

$cod_producto = "TABLET";
$nombre_producto = "Tablet PC";
$stmt->bind_param('ss', $cod_producto, $nombre_producto);

$stmt->execute();
$stmt->close();
$conProyecto->close();