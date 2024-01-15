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
    try {
        $query = 'INSERT INTO productos (nombre, nombre_corto, descripcion, pvp, familia) VALUES (?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($query);
        // Verificar si la preparación fue exitosa
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta.");
        }
        // Enlazar parámetros
        $stmt->bind_param('sssis', $nombre, $nombrecorto, $descripcion, $pvp, $familia);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            displaySuccessMessage("Registro guardado");

        } else {
            throw new Exception("No se pudo insertar el registro.");
        }
        $stmt->close();
    } catch (Exception $e) {
        displayErrorMessage("Error: " . $e->getMessage());
    }
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
            displaySuccessMessage("Registro actualizado");
        } else {
            // Revertir la transacción en caso de fallo
            $conn->rollback();
            displayErrorMessage("No se realizaron cambios.");
        }
        // Cerrar el statement
        $stmt->close();
    } catch (Exception $e) {
        // Revertir la transacción en caso de excepción
        $conn->rollback();
        displayErrorMessage("Error: " . $e->getMessage());
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
            displaySuccessMessage("Registro eliminado");
        } else {
            // Revertir la transacción en caso de fallo
            $conn->rollback();
            displayErrorMessage("No se realizaron cambios.");
        }

        // Cerrar el statement
        $stmt->close();
    } catch (Exception $e) {
        // Revertir la transacción en caso de excepción
        $conn->rollback();
        displayErrorMessage("Error: " . $e->getMessage());
    }
}

function displaySuccessMessage($message)
{
    echo '<script type="text/javascript">
            alert("' . $message . '");
            window.location.href="listado.php";
        </script>';
}

function displayErrorMessage($message)
{
    echo $message;
}