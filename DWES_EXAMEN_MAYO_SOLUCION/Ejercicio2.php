<!DOCTYPE html>
<html>

<body>
    <form name='f1' method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
        <fieldset>
            <legend>Busqueda del alumno</legend>
            <label for='Nombre'>Nombre </label><input type='text' name='Nombre'>
            <label for='Apellido1'>Apellido1 </label><input type='text' name='Apellido1'>
            <label for='Apellido2'>Apellido2 </label><input type='text' name='Apellido2'><br>
            <label for='Min'>Edad Min </label><input type='text' name='Min' size='3'>
            <label for='Max'>Edad Max </label><input type='text' name='Max' size='3'><br>
            <input type='submit' name='Buscar' value='Buscar'>
        </fieldset>

        <?php
        $consulta = "";  //Inicializamos la variable consulta

        if (isset($_POST['Buscar']))       //Estamos accediendo tras pulsar el botón buscar
        {

            $nombre = $_POST['Nombre'];
            $apellido1 = $_POST['Apellido1'];
            $apellido2 = $_POST['Apellido2'];
            $min = $_POST['Min'];
            $max = $_POST['Max'];
            $consulta = "select * from Alumnos where 1 "; // Establecemos la consulta por defecto
            // "where 1" al ser 1 evaluabre a TRUE en SQL lista todas las filas  
            // es lo mismo que no poner un where , pero sirver para dejar esta sentencia y que ya solo tengamos que completar con AND los campos necesarios

            //Para cada campo no vacio lo concatenamos a la consulta principal  

            if ($nombre != '') {
                $consulta .= " And Nombre='$nombre'";
            }
            if ($apellido1 != '') {
                $consulta .= " AND  Apellido1='$apellido1'";
            }
            if ($apellido2 != '') {
                $consulta .= " AND  Apellido2='$apellido2'";
            }
            if ($min != '') {
                $consulta .= " AND  Edad>=$min";
            }
            if ($max != '') {
                $consulta .= " AND  Edad<=$max";
            }

            $db = mysqli_connect("localhost", "root", "", "mayo");

            if (!$db) {
                echo ("Error de conexión: " . mysqli_connect_error() . "<br>");
                echo ("Error numero: " . mysqli_connect_errno() . "<br>");

                exit();
            } else //Si me he conectado correctamente
            {
                $resul = mysqli_query($db, $consulta);  //Ejecutamos la consulta
                echo "<table border='2'>";
                echo "<th>DNI</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido1</th>";
                echo "<th>Apellido2</th>";
                echo "<th>Edad</th>";
                echo "<th>Telefono</th>";

                while (($fila = mysqli_fetch_assoc($resul)) != null) {
                    echo "<tr>";
                    echo "<td>$fila[Dni]</td>";
                    echo "<td>$fila[Nombre]</td>";
                    echo "<td>$fila[Apellido1]</td>";
                    echo "<td>$fila[Apellido2]</td>";
                    echo "<td>$fila[Edad]</td>";
                    echo "<td>$fila[Telefono]</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($db);
            }
        }
        ?>
    </form>
</body>

</html>