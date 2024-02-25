<?php
session_start();
require_once './php/control-acceso.php';
$error_message = ''; // Inicializar la variable de mensaje de error


// Verificar si el usuario está bloqueado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    if (usuarioBloqueado($_POST['username'])) {
        echo "El usuario está bloqueado. Inténtalo de nuevo más tarde.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "tarea4";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    // Con la base de datos proporcionada, si encripto la contraseña para los usuarios, siempre da fallo, sin embargo, si la introduzco como texto plano funciona.
    // Dejo la linea de conmo se encriptaría comentada pero habilitada la linea sin encriptación
    // ('ivan', '8927bd748f26a7258a01e318a7e1e7585458a228'),
    // ('usuario', '331b6cde6c31f5cb51688f202b56e16ba37d3996');

    // $password = sha1($_POST['password']); // Encriptar la contraseña con SHA1
    $password = $_POST['password']; // Login sin encriptar la contraseña

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario=? AND contrasena=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;
        
        // Redireccionar al usuario a la página principal
        header("location: php/principal.php");
        // Limpiar la variable de mensaje de error
        $error_message = null;
        // Registrar el intento de inicio de sesión como exitoso
        registrarIntento($username, $password, "concedido");
    } else {
        $error_message = "Usuario/Clave incorrecto";
        // Registrar el intento de inicio de sesión como fallido
        registrarIntento($username, $password, "denegado");
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DWES04 - Inicio de sesión</title>
        <link rel="stylesheet" type="text/css" href="styles/login.css">
    </head>
    <body>

    <form action="" method="post">
        <h2>Iniciar sesión</h2>
        <input type="text" name="username" placeholder="Nombre de usuario" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <input type="submit" value="Iniciar sesión">

        <?php if (isset($error_message)) { ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php } ?>
    </form>

    </body>
</html> 

