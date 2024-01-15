<?php
include "./script/connection.php";
include "./script/query-crud.php";

//Obtener las familias
$conn = openConnection();
$familias = getFamilias($conn);
closeConnection($conn);

//Funcionalidad de los botones
if (isset($_POST['save'])) {
    //Recoger datos
    // Verifica si se ha enviado el formulario
    // Recupera los valores de los campos y almacénalos en variables
    $nombre = $_POST["nombre"];
    $nombrecorto = $_POST["nombrecorto"];
    $descripcion = $_POST["descripcion"];
    $pvp = $_POST["pvp"];
    $familia = $_POST["familia"];

    //Boton de guardar presionado
    $conn = openConnection();
    createData($conn, $nombre, $nombrecorto, $descripcion, $pvp, $familia);
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
    <title>Tarea Tema 3: Crear</title>
</head>

<form id="form-create" action="" method="post">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" id="nombre" aria-describedby="nombre" name="nombre">
    </div>
    <div class="mb-3">
        <label for="nombrecorto" class="form-label">Nombre corto</label>
        <input type="text" class="form-control" id="nombrecorto" aria-describedby="nombre corto" name="nombrecorto">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" aria-describedby="descripcion" name="descripcion">
    </div>
    <div class="mb-3">
        <label for="pvp" class="form-label">PVP:</label>
        <input type="text" class="form-control" id="pvp" aria-describedby="pvp" name="pvp">
    </div>
    <div class="mb-3">
        <!-- <label for="familia" class="form-label">Familia</label>
        <input type="text" class="form-control" id="familia" aria-describedby="familia" name="familia"> -->
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
    <button type="submit" name="save" class="btn btn-primary">Guardar</button>
</form>
</body>

</html>