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

//Finalizar conexion con BBDD
$connect->close();
