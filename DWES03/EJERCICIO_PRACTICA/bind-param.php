<?php
$connect = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');

$stmt = $connect->stmt_init();
$stmt->prepare('SELECT producto, unidades FROM stocks WHERE unidades < 2');
$stmt->execute();
$stmt->bind_result($producto, $unidades);
while ($stmt->fetch()) {
    echo "<p>Producto $producto: $unidades unidades.</p>";
}
$stmt->close();
$connect->close();
