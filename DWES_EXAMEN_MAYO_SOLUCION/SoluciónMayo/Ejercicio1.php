<!DOCTYPE html>
<html lang="es">
<?php

require_once 'DaoAlumnos.php';

$base = "mayo";
// Crear una nueva instancia de DaoAlumnos
$dao = new DaoAlumnos($base);
// Crear un array vacío para almacenar los alumnos seleccionados
$selec = array();
// Comprobar si se ha enviado el formulario y si se han seleccionado alumnos
if (isset($_POST['Alumnos'])) {
    $selec = $_POST['Alumnos'];
}

// Función que muestra un formulario de actualización para el alumno con ese DNI
function MostrarFormulario($dni)
{
    // Hacer global la variable $dao para poder usarla dentro de la función
    global $dao;

    $nombre = "";
    $apellido1 = "";
    $apellido2 = "";
    $edad = "";
    $telefono = "";

    //Recuperamos los datos de ese id

    $alumno = $dao->obtener($dni);

    $dni = $alumno->__get('Dni');
    $nombre = $alumno->__get('Nombre');
    $apellido1 = $alumno->__get('Apellido1');
    $apellido2 = $alumno->__get('Apellido2');
    $edad = $alumno->__get('Edad');
    $telefono = $alumno->__get('Telefono');


    echo "<fieldset>";
    echo "<legend>Datos del alumno con Dni:$dni</legend>";
    echo "<label for='nombre'><b>nombre </b></label><input type='text' name='nombres[$dni]' value='$nombre'><br>
                   <label for='apellido1'><b>apellido1</b> </label><input type='text' name='apellidos1[$dni]''  value='$apellido1'><br>
                   <label for='apellido2'><b>apellido2 </b></label><input type='text' name='apellidos2[$dni]'  value='$apellido2'><br>
                   <label for='edad'><b>edad </label></b><input type='text' name='edads[$dni]'  value='$edad'><br>
                   <label for='telefono'><b>telefono </b></label><input type='text' name='telefonos[$dni]'  value='$telefono'><br>";

    echo "<br><br>";
    echo "</fieldset>";
}



if (isset($_POST['Actualizar'])  && isset($selec))   //Si hemos pulsado actualizar y hay elementos seleccionados
{
    //REcogemos los arrays con los nombres, apellidos, edades y teléfonos

    $nombres = $_POST['nombres'];
    $apellidos1 = $_POST['apellidos1'];
    $apellidos2 = $_POST['apellidos2'];
    $edads =     $_POST['edads'];
    $telefonos = $_POST['telefonos'];


    foreach ($selec as $clave => $valor)    //Para cada uno de los alumnos seleccionados
    {
        $alu = new Alumno();     //Creamos un objeto alumno y fijamos sus propiedades con el contenido de ese formulario

        $alu->__set("Dni", $clave);
        $alu->__set("Nombre", $nombres[$clave]);
        $alu->__set("Apellido1", $apellidos1[$clave]);
        $alu->__set("Apellido2", $apellidos2[$clave]);
        $alu->__set("Telefono", $telefonos[$clave]);
        $alu->__set("Edad", $edads[$clave]);

        $dao->actualizar($alu); //Actualizamos ese alumno
    }
}
?>


<body>

    <form name='f1' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
        <fieldset>
            <legend>Listado de alumnos</legend>

            <input type="submit" name='Seleccionar' value='Seleccionar'>

            <table border='2'>
                <th>Selec</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido1</th>
                <th>Apellido2</th>
                <th>Edad</th>
                <th>Telefono</th>

                <?php
                $dao->listar();  //Listamos los alumnos
                foreach ($dao->alumnos as $alu)   //Mostramos los alumnos listados dejando fijado el checkbox tras la recarga
                {
                    if ((empty($selec)) || (!empty($selec) && array_key_exists($alu->__get("Dni"), $selec))) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='Alumnos[" . $alu->__get("Dni") . "]'  ";

                        if (!empty($selec)) {
                            echo " checked ";
                        }
                        echo   "></td>";
                        echo "<td>" . $alu->__get("Dni") . "</td>";
                        echo "<td>" . $alu->__get("Nombre") . "</td>";
                        echo "<td>" . $alu->__get("Apellido1") . "</td>";
                        echo "<td>" . $alu->__get("Apellido2") . "</td>";
                        echo "<td>" . $alu->__get("Edad") . "</td>";
                        echo "<td>" . $alu->__get("Telefono") . "</td>";

                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </fieldset>

        <?php

        if (isset($_POST['Seleccionar']))    //Si hemos pulsado el botón seleccionar
        {
            foreach ($selec as $clave => $valor)  //Para cada alumno seleccionado
            {
                MostrarFormulario($clave);    //Mostramos su formulario de actualizacion
            }
            //Mostramos el botón de actualizar  solo si hay formularios de actualizados
            if (!empty($selec)) {
                echo "<input type='submit' name='Actualizar' value='Actualizar'>";
            }
        }
        ?>
    </form>
</body>

</html>