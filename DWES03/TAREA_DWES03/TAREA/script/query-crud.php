<?php
// include './connection.php';

function createData($nombre, $nombrecorto, $descripcion, $pvp, $familia)
{
}

function updateDataById($conn, $idProducto, $nombre, $nombrecorto, $descripcion, $pvp, $familia)
{
    // $conn = openConnection();
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


function deleteDataById($idProducto)
{
}
