<?php


function saveData($nombre, $nombrecorto, $descripcion, $pvp, $familia)
{
    include './script/conection.php';

    //Establecer la conexion con la BBDD
    // $connect = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');
    //Error al conectar
    // if ($conn->connect_error) {
    //     echo "Se ha producido un error";
    //     die('Error de conexión(' . $conn->connect_errno . ')' . $conn->connect_error);
    // };

    
    try {
        //Almacenar en la BBDD el producto
        $stmt = $conn->stmt_init();
        $stmt->prepare('INSERT INTO productos (nombre, nombre_corto, descripcion, pvp, familia) VALUES(?, ?, ?, ?, ?)');
        $stmt->bind_param('sssis', $nombre, $nombrecorto, $descripcion, $pvp, $familia);
        $stmt->execute();

        echo '
            <div class="col-md-12 themed-grid-col">
                <div class="pb-3">
                    <a href="../listado.php"><button type="button" class="btn btn-p btn-primary ">Volver a listado</button></a>
                </div>
                <div class="pb-3">
                    <h2>Registro creado correctamente</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 themed-grid-col"><strong>Nombre:</strong> ' . $nombre . '</div>
                </div>
                <div class="row">
                    <div class="col-md-12 themed-grid-col"><stronmg>Nombre corto:</stronmg> ' . $nombrecorto . '</div>
                </div>
                <div class="row">
                    <div class="col-md-12 themed-grid-col"><strong>Descripción:</stronmg> ' . $descripcion . '</div>
                </div>
                <div class="row">
                    <div class="col-md-12 themed-grid-col"><strong>PVP:</stronmg> ' . $pvp . '</div>
                </div>
                    <div class="row">
                    <div class="col-md-12 themed-grid-col"><strong>Familia:</stronmg> ' . $familia . '</div>
                </div>
            </div>
            ';
        //Cerrar conexiones
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo 'Error en la ejecución de la consulta: ' . $e->getMessage();
    }
}

//Recoger datos
// Verifica si se ha enviado el formulario
// Recupera los valores de los campos y almacénalos en variables
$nombre = $_POST["nombre"];
$nombrecorto = $_POST["nombrecorto"];
$descripcion = $_POST["descripcion"];
$pvp = $_POST["pvp"];
$familia = $_POST["familia"];

//Funcionalidad de los botones
if (isset($_POST['guardar'])) {
    //Boton de guardar presionado
    saveData($nombre, $nombrecorto, $descripcion, $pvp, $familia);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap-5.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <script src="bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <title>Tarea Tema 3: Registro creado</title>
</head>

<body></body>

</html>