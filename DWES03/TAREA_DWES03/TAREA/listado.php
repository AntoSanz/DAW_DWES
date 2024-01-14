<?php
$connect = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');

//Controlar posible error de conexión
if ($connect->connect_error) {
    echo "Se ha producido un error";
    die('Error de conexión(' . $connect->connect_errno . ')' . $connect->connect_error);
};

function closeConnection()
{
    //Cerrar conexion con la base de datos.
    global $connect;
    $connect->close();
};
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio Tema 3: Conjuntos de resultados en MySQLi</title>
    <link rel="stylesheet" href="bootstrap-5.3.2/css/bootstrap.min.css" />
    <script src="bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <title>Tarea Tema 3: Listado</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $stmt = $connect->stmt_init();
            $stmt -> prepare('SELECT id, nombre FROM productos');
            $stmt->execute();
            $stmt->bind_result($idProducto, $nombreProducto);
            while ($stmt->fetch()) {
                echo '<tr>';
                echo '<th scope="row">'. $idProducto . '</th>';
                echo '<td>'. $nombreProducto.'</td>';
                echo '<td>';
                echo '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                echo '<button type="button" class="btn btn-warning">Editar</button>';
                echo '<button type="button" class="btn btn-danger">Borrar</button>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            $stmt->close();
            $connect->close();

            ?>
        </tbody>
    </table>
</body>

</html>