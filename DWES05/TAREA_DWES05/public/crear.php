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
            <form action="../php/crear_alumno.php" method="post">
                <div>
                    <h2>Añadir alumno</h2>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="">
                    <label for="dni">DNI</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="nombre" placeholder="">
                    <label for="name">Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="">
                    <label for="apellido1">Primer apellido</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="">
                    <label for="apellido2">Segundo apellido</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="edad" name="edad" placeholder="">
                    <label for="edad">Edad</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="">
                    <label for="telefono">Telefono</label>
                </div>
                <div class="d-grid gap-2 col-4 mx-auto">
                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a href="listado.php" class="btn btn-secondary">Cancelar</a>

                </div>
            </form>
        </div>
    </div>

</body>

</html>