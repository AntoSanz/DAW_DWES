<?php
//Establecer conexion
include './script/connection.php';
include './script/query-crud.php';
try {
    // Verifica si se ha proporcionado un ID en la URL


    if (isset($_GET['id'])) {

        $idProducto = $_GET['id'];
        $conn = openConnection();
        $result = getDataById($conn, $idProducto);
        closeConnection($conn);

        // Verificar si hay resultados
            echo '
            <div class="card" id="card-'. $result['id'] .'" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">'. $result['nombre'] .'</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    <h6>Nombre corto</h6> 
                    <p>'. $result['nombreCorto'] .'</p>
                    </li>
                    <li class="list-group-item">
                    <h6>Familia</h6> 
                    <p>'. $result['familia'] .'</p>
                    </li>
                    <li class="list-group-item">
                    <h6>PVP</h6> 
                    <p>'. $result['pvp'] .'€</p>
                    </li>
                    <li class="list-group-item">
                    <h6>Descripción</h6>
                    <p>'. $result['descripcion'] .'</p>
                    </li>
                </ul>
                <div class="card-body">
                    <a href="./listado.php" class="card-link">Volver</a> 
                    <a href="./update.php?id='. $result['id'] .'" class="card-link">Editar</a>  
                </div>
            </div>
            ';
    } else {
        // Si no se proporcionó un ID, lanzar una excepción
        throw new Exception("Error: ID no proporcionado.");
    }
} catch (Exception $e) {
    // Manejar la excepción
    echo 'Error: ' . $e->getMessage();
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-5.3.2/css/bootstrap.min.css" />
    <script src="bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./styles/styles.css" />
    <title>Tarea Tema 3: Detalle</title>
</head>

<body>

</body>

</html>