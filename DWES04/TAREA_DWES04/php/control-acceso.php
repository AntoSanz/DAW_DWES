<?php

// Función para registrar el intento de inicio de sesión en la base de datos
function registrarIntento($username, $password, $resultado) {
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "tarea4";

    // Crear conexión
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
    
    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener la hora actual en formato Epoch
    $hora_actual = time();

    // Determinar si el acceso fue concedido o denegado
    $acceso = ($resultado == "concedido") ? "C" : "D";

    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO login (usuario, clave, hora, acceso) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $username, $password, $hora_actual, $acceso);

    // Ejecutar la consulta
    $stmt->execute();

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}

// Función para verificar si el usuario está bloqueado
function usuarioBloqueado($username) {
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "tarea4";

    // Crear conexión
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
    
    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener la hora actual menos 3 minutos en formato Epoch
    $hora_limite = time() - (3 * 60);

    // Preparar la consulta SQL para contar los intentos de inicio de sesión fallidos en los últimos 3 minutos
    $stmt = $conn->prepare("SELECT COUNT(*) AS num_intentos FROM login WHERE usuario = ? AND acceso = 'D' AND hora >= ?");
    $stmt->bind_param("si", $username, $hora_limite);
    $stmt->execute();
    $result = $stmt->get_result();

    // Obtener el número de intentos de inicio de sesión fallidos
    $row = $result->fetch_assoc();
    $num_intentos = $row['num_intentos'];

    // Cerrar la conexión
    $stmt->close();
    $conn->close();

    // Si el número de intentos es igual o mayor a 3, el usuario está bloqueado
    return $num_intentos >= 3;
}

?>
