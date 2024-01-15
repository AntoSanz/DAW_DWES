<?php

/**
 * Obtiene los datos de un producto proporcionandole el id
 */
function getDataById($conn, $idProducto)
{
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
    // Devolver el array
    return $data;
}

/**
 * Crea un nuevo registro en la BBDD de productos
 
 */
function createData($conn, $nombre, $nombrecorto, $descripcion, $pvp, $familia)
{
}

/**
 * Actualiza un registro de la base de datos de productos
 */
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

/**
 * Borra un registro de la BBDD de productos proporcionandole un ID
 */
function deleteDataById($conn, $idProducto)
{
    try {
        $conn->autocommit(false);
        // Preparar la consulta de eliminación
        $query = "DELETE FROM productos WHERE id=?";
        $stmt = $conn->prepare($query);
        // Verificar si la preparación fue exitosa
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta.");
        }
        // Enlazar parámetros
        $stmt->bind_param('i', $idProducto);

        // Ejecutar la consulta
        $stmt->execute();

        // Verificar si la eliminación fue exitosa
        if ($stmt->affected_rows > 0) {
            // Confirmar la transacción
            $conn->commit();
            echo "Registro eliminado.";
        } else {
            // Revertir la transacción en caso de fallo
            $conn->rollback();
            echo "No se realizó la eliminación. Es posible que el ID no exista.";
        }

        // Cerrar el statement
        $stmt->close();
    } catch (Exception $e) {
         // Revertir la transacción en caso de excepción
         $conn->rollback();
         echo "Error: " . $e->getMessage();
    }
}
