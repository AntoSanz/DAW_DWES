<?php
//3.1.1.- Establecimiento de conexiones.
// utilizando constructores y métodos de la programación orientada a objetos
@$connect = new mysqli('localhost', 'gestor', 'secreto', 'daw_dwes_03_ejercicio');
print $connect->server_info;

//Comprobar error
$error = $connect->connect_errno;
if ($error != null) {
    echo "<p>Error $error conectando a la base de datos: $connect</p>";
    die();
}

//3.1.2.- Ejecución de consultas.
if ($error === null) {
    //DELETE
    $result = $connect->query('DELETE FROM stock WHERE unidades=0');
    if ($result) {
        echo "<p>Se han borrado $connect->affected_rows registros.</p>";
    }
    //SELECT
    $result = $connect->query('SELECT producto, unidades FROM stock', MYSQLI_USE_RESULT);
}

$result->free();

//3.1.3.- Transacciones.
// deshabilitamos el modo transaccional automático
$connect->autocommit(false);

$connect->query('DELETE FROM stock WHERE unidades=0');  // Inicia una transacción
$connect->query('UPDATE stock SET unidades=3 WHERE producto="STYLUSSX515W"');

$connect->commit();  // Confirma los cambios

//Finalizar conexion con BBDD
$connect->close();
