<?php
// Obtener todas las clases (incluida la clase DB)
spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

// Crear la clase DB con el nombre de la base de datos correspondiente
$bbddname = "daw_dwes_05";
$DB = new DB($bbddname);

// Crear una instancia de la clase Alumno con el nombre de la base de datos
$alumno = new Alumno($bbddname);

// Obtener la lista de todos los alumnos
$alumnosList = $alumno->getAlumnosList();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Alumnos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons CSS -->
    <link href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Listado de Alumnos</h2>
                <a href="crear.php" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Añadir Alumno</a>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Primer Apellido</th>
                            <th scope="col">Segundo Apellido</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alumnosList as $alumno) : ?>
                            <tr>
                                <td><?php echo $alumno['Dni']; ?></td>
                                <td><?php echo $alumno['Nombre']; ?></td>
                                <td><?php echo $alumno['Apellido1']; ?></td>
                                <td><?php echo $alumno['Apellido2']; ?></td>
                                <td><?php echo $alumno['Edad']; ?></td>
                                <td><?php echo $alumno['Telefono']; ?></td>
                                <td>
                                    <a href="detalle.php?dni=<?php echo $alumno['Dni']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-info-circle-fill"></i> Detalle</a>
                                    <a href="update.php?dni=<?php echo $alumno['Dni']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i> Editar</a>
                                    <a href="borrar.php?dni=<?php echo $alumno['Dni']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> Borrar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
