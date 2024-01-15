<?php
function getDataById($conn, $idProducto){
    //Inicializar las variables en null
    $id = $nombre = $nombreCorto = $descripcion = $pvp = $familia = null;

    $stmt = $conn->stmt_init();
    $stmt->prepare('SELECT id, nombre, nombre_corto, descripcion, pvp, familia FROM productos WHERE id=?');
    $stmt->bind_param('i', $idProducto);
    $stmt->execute();
    $stmt->bind_result($id, $nombre, $nombreCorto, $descripcion, $pvp, $familia);
    $stmt->fetch();

    // Crear un array asociativo con los valores obtenidos
    $data = array(
        'id' => $id,
        'nombre' => $nombre,
        'nombreCorto' => $nombreCorto,
        'descripcion' => $descripcion,
        'pvp' => $pvp,
        'familia' => $familia,
    );

    $stmt->close();
    // Retornar el array
    return $data;
}

function createData($conn, $nombre, $nombrecorto, $descripcion, $pvp, $familia)
{
}

function updateDataById($conn, $idProducto, $nombre, $nombrecorto, $descripcion, $pvp, $familia)
{
    try {
        $conn->autocommit(false);
        $query = "UPDATE productos SET nombre=?, nombre_corto=?, descripcion=?, pvp=?, familia=? WHERE id=?";
        $stmt = $conn->prepare($query);
        // Verificar si la preparación fue exitosa
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta.");
        }
        // Enlazar parámetros
        $stmt->bind_param('sssssi', $nombre, $nombrecorto, $descripcion, $pvp, $familia, $idProducto);
        // Ejecutar la consulta
        $stmt->execute();
        // Verificar si la actualización fue exitosa
        if ($stmt->affected_rows > 0) {
            // Confirmar la transacción
            $conn->commit();
            echo "Actualización exitosa.";
        } else {
            // Revertir la transacción en caso de fallo
            $conn->rollback();
            echo "No se realizaron cambios.";
        }
        // Cerrar el statement
        $stmt->close();

    } catch (Exception $e) {
        // Revertir la transacción en caso de excepción
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}


function deleteDataById($conn, $idProducto)
{
}
