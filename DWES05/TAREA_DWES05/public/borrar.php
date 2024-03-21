<?php
// Incluir el archivo borrar_alumno.php
require "../php/borrar_alumno.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Borrado</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>¿Desea borrar el alumno?</h2>

        <!-- Tarjeta con los datos del alumno -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Datos del Alumno</h5>
                <p class="card-text">DNI: <?php echo $_GET['dni']; ?></p>
                <!-- Aquí podrías mostrar más datos del alumno si los tienes disponibles en tu base de datos -->
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <form action="../php/borrar_alumno.php" method="post">
                    <!-- Pasar el dni del alumno a borrar -->
                    <input type="hidden" name="dni_alumno" value="<?php echo $_GET['dni']; ?>">
                    <button type="submit" class="btn btn-danger mr-2" name="confirmar">Confirmar</button>
                    <a href="listado.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>