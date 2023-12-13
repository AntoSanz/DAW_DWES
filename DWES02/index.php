<!DOCTYPE html>
<html lang="es">

<head>
    <title>Practica 2 DWES - Antonio Sanz Pans</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <form action="script.php" method="post">
        <fieldset>
            <legend>Introduzca un registro en la Agenda</legend>
            <div class="field">
                <label for="dni">DNI:</label>
                <input id="dni" name="dni" />
            </div>
            <div class="field">
                <label for="nombre">Nombre:</label>
                <input id="nombre" name="nombre" />
            </div>
            <div class="field">
                <label for="apellido1">Apellido1:</label>
                <input id="apellido1" name="apellido1" />
            </div>
            <div class="field">
                <label for="apellido2">Apellido2:</label>
                <input id="apellido2" name="apellido2" />
            </div>
            <div class="field">
                <label for="telefono">Telefono:</label>
                <input id="telefono" name="telefono" />
            </div>
            <div class="button-box">
                <button type="submit" name="guardar">Guardar</button>
                <button type="submit" name="mostrar">Mostrar</button>
                <button type="submit" name="borrar">Borrar</button>
            </div>
        </fieldset>
    </form>
</body>

</html>