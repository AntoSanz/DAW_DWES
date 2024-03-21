<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Alumno</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card mt-3">
            <div class="card-body">
                <h2>Datos del alumno</h2>
                <?php include '../php/obtener_alumno.php'; ?>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <a href="listado.php" class="btn btn-primary">Volver al Listado</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>