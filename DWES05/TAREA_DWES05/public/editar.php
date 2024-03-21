<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Alumno</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <title>Tarea Tema 5: Crear Alumno</title>
</head>

<body>
    <div class="container mt-5">

        <div class="form-box">
            <form action="../php/editar_alumno.php" method="post">
                <div>
                    <h2>Añadir alumno</h2>
                </div>
                    <?php include '../php/editar_alumno.php'; ?>
                <div class="d-grid gap-2 col-4 mx-auto">
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                    <a href="listado.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>