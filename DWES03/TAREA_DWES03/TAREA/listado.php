<?php
    include './script/connection.php';
    $conn = openConnection();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-5.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <script src="bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <title>Tarea Tema 3: Listado</title>
</head>

<body>
    <div class="container-fluid container-btn">
        <a href="crear.php"><button type="button" class="btn btn-p btn-primary ">Añadir registro</button></a>
    </div>
    <div class="container-fluid container-table">
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
                $stmt = $conn->stmt_init();
                $stmt->prepare('SELECT id, nombre FROM productos');
                $stmt->execute();
                $stmt->bind_result($idProducto, $nombreProducto);
                while ($stmt->fetch()) {
                    echo '<tr>';
                    echo '<th scope="row">' . $idProducto . '</th>';
                    echo '<td>' . $nombreProducto . '</td>';
                    echo '<td>';
                    echo '<div class="btn-group btn-group-sm" role="group">';
                    echo ' <a href="detalle.php?id=' . $idProducto . '" class="btn btn-info">Detalle</a>';
                    echo ' <a href="update.php?id=' . $idProducto . '" class="btn btn-warning">Editar</a>';
                    echo ' <a href="borrar.php?id=' . $idProducto . '" class="btn btn-danger">Borrar</a>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }

                $stmt->close();
                closeConnection($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>