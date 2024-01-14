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

//3.1.4.- Obtención y utilización de conjuntos de resultados.
$result = $connect->query('SELECT producto, unidades FROM stocks WHERE unidades<2');
$stock = $result->fetch_array();  // Obtenemos el primer registro
$producto = $stock['producto'];  // O también $stock[0];
$unidades = $stock['unidades'];  // O también $stock[1];

//Recorrer todos los registros. Cuandoi no haya mas devolverá null
$result = $connect->query('SELECT producto, unidades FROM stocks WHERE unidades<2');
$stock = $result->fetch_object();
while ($stock != null) {
    echo "<p>Producto $stock->producto: $stock->unidades unidades.</p>";
    $stock = $resultado->fetch_object();
}

echo "<p>Producto $producto: $unidades unidades.</p>";

//Finalizar conexion con BBDD
$connect->close();
