<?php
//Obtener todas las clases
spl_autoload_register(function ($class) {
    require "../class/" . $class . ".php";
});

//Crear la clase DB con el nombre de la base de datos correspondiente
    $bbddname = "daw_dwes_05";
    $DB = new DB($bbddname);
?>
<!DOCTYPE html>
<html>

</html>