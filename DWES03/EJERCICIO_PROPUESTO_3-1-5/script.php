// A partir de la página web obtenida en el ejercicio anterior, añade la opción de modificar el número de unidades del producto en cada una de las tiendas. 
//Utiliza una consulta preparada para la actualización de registros en la tabla stocks. 
//No es necesario tener en cuenta las tareas de inserción (no existían unidades anteriormente) y borrado (si el número final de unidades es cero).

<?php
//Hacemos la conexión con la base de datos.
$connect = new mysqli('localhost','gestor','secreto','proyecto');
//Controlamos un posible error de conexion
if($conProyecto->connect_error){
    die('Error de conexión(' . $conProyecto->connect_errno . ')' . $conProyecto->connect_error); //die() detiene la ejecución del código php
};

function cerrarConexion(){
    global $connect;
    $connect -> close();
};

function pintarBoton(){
    echo "<a href='{$_SERVER['PHP_SELF']}' class='btn btn-success mb-2'>Consultar Otro Artículo</a>";
}