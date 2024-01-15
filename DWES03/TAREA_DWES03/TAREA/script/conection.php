<?php
function openConnection()
{
    $host = "localhost";
    $user = "gestor";
    $password = "secreto";
    $database = "proyecto";

    try {
        // Crear una nueva conexión
        $conn = new mysqli($host, $user, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            throw new Exception("Error de conexión: " . $conn->connect_error);
        }
        return $conn;
    } catch (Exception $e) {
        // Manejar excepcion
        echo 'Error en la conexión a la base de datos: ' . $e->getMessage();
        exit();
    }
}

function closeConnection()
{
    // Cerrar conexion con la base de datos.
    global $conn;
    try {
        if ($conn) {
            $conn->close();
        }
    } catch (Exception $e) {
        // Manejar excepcion        
        echo 'Error al cerrar la conexión: ' . $e->getMessage();
    }
}
