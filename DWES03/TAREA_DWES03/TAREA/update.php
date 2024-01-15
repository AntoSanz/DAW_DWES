<?php
//Establecer conexion
include './script/connection.php';
include './script/query-crud.php';

//Obtener las familias
$conn = openConnection();
$familias = getFamilias($conn);
closeConnection($conn);

//Obtener datos por el ID
if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];
    $conn = openConnection();
    $result = getDataById($conn, $idProducto);
    closeConnection($conn);
}

// Verificar si se ha enviado el formulario para actualizar
if (isset($_POST['update'])) {

    // Recoger datos del formulario
    $idProducto = $_POST["id"];
    $nombre = $_POST["nombre"];
    $nombrecorto = $_POST["nombrecorto"];
    $descripcion = $_POST["descripcion"];
    $pvp = $_POST["pvp"];
    $familia = $_POST["familia"];

    // Llamar a la función de actualización
    
    $conn = openConnection();
    updateDataById($conn, $idProducto, $nombre, $nombrecorto, $descripcion, $pvp, $familia);
    closeConnection($conn);
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
    <title>Tarea Tema 3: Update</title>
</head>

<body>
    <form id="form-update" action="" method="post">
        <div class="mb-3">
            <input type="text" class="form-control" id="id" aria-describedby="id" name="id" value="<?php echo $result['id']; ?>" hidden>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" id="nombre" aria-describedby="nombre" name="nombre" value="<?php echo $result['nombre']; ?>">
        </div>
        <div class="mb-3">
            <label for="nombrecorto" class="form-label">Nombre corto</label>
            <input type="text" class="form-control" id="nombrecorto" aria-describedby="nombre corto" name="nombrecorto" value="<?php echo $result['nombreCorto']; ?>">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" aria-describedby="descripcion" name="descripcion" value="<?php echo $result['descripcion']; ?>">
        </div>
        <div class="mb-3">
            <label for="pvp" class="form-label">PVP:</label>
            <input type="text" class="form-control" id="pvp" aria-describedby="pvp" name="pvp" value="<?php echo $result['pvp']; ?>">
        </div>
        <div class="mb-3">
        <label for="selectFamilias" class="form-label">Familia:</label>
        <select class="form-select" id="selectFamilias" name="familia">
            <?php
            // Iterar sobre el array de familias para construir las opciones del dropdown
            foreach ($familias as $familia) {
                echo '<option value="' . $familia['cod'] . '">' . $familia['nombre'] . '</option>';
            }
            ?>
        </select>
    </div>
        <button type="submit" name="update" class="btn btn-warning">Actualizar</button>
        <a href="listado.php"><button type="button" class="btn btn-p btn-primary ">Volver</button></a>
    </form>
</body>

</html>