<?php

class Alumno extends DB
{
    private $dni;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $edad;
    private $telefono;

    public function __construct($base)
    {
        parent::__construct($base);
    }

    public function __destruct()
    {
        // Cerrar la conexión a la base de datos al destruir el objeto
        parent::Cerrar();
    }

    // Métodos getter y setter para el atributo $dni
    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    // Métodos getter y setter para el atributo $nombre
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    // Métodos getter y setter para el atributo $apellido1
    public function getApellido1()
    {
        return $this->apellido1;
    }

    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;
    }

    // Métodos getter y setter para el atributo $apellido2
    public function getApellido2()
    {
        return $this->apellido2;
    }

    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;
    }

    // Métodos getter y setter para el atributo $edad
    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    // Métodos getter y setter para el atributo $telefono
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    //Consultas DB
    // 	* Listar. Que listará todos los registros de la tabla alumnos.
    public function getAlumnosList()
    {
        // Definir la consulta SQL
        $query = "SELECT Dni, Nombre, Apellido1, Apellido2, Edad, Telefono FROM Alumnos";
        // Preparar la consulta SQL utilizando PDO
        $stmt = $this->con->prepare($query);

        try {
            // Ejecutar la consulta preparada
            $stmt->execute();
            $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alumnos;
        } catch (PDOException $ex) {
            die("Error al recuperar: " . $ex->getMessage());
        }
    }

    // 	* Insertar. Que recibirá como parámetro un objeto de tipo alumno y deberá insertar sus datos en la tabla.
    public function createAlumno($dni, $nombre, $apellido1, $apellido2, $edad, $telefono)
    {
        // Definir la consulta SQL
        $query = "INSERT INTO Alumnos (Dni, Nombre, Apellido1, Apellido2, Edad, Telefono) VALUES (:dni, :nombre, :apellido1, :apellido2, :edad, :telefono)";
        // Preparar la consulta SQL utilizando PDO
        $stmt = $this->con->prepare($query);
        try {
            // Ejecutar la consulta preparada, pasando los valores de los parámetros
            $stmt->execute([
                ':dni' => $dni,
                ':nombre' => $nombre,
                ':apellido1' => $apellido1,
                ':apellido2' => $apellido2,
                ':edad' => $edad,
                ':telefono' => $telefono
            ]);

            // Mostrar un mensaje de éxito si la inserción se realiza correctamente
            echo "Alumno creado exitosamente.";
        } catch (PDOException $ex) {
            // Capturar y manejar cualquier excepción
            die("Error al crear alumno: " . $ex->getMessage());
        }
    }

    // 	* Actualizar. Recibirá también un objeto de tipo alumno y actualizará sus datos en la tabla.
    public function updateAlumno($dni, $nombre, $apellido1, $apellido2, $edad, $telefono)
    {
        // Consulta SQL para actualizar los datos del alumno en la tabla de alumnos
        $update = "UPDATE Alumnos SET Nombre = :nombre, Apellido1 = :apellido1, Apellido2 = :apellido2, Edad = :edad, Telefono = :telefono WHERE Dni = :dni";

        // Preparar la consulta SQL utilizando PDO
        $stmt = $this->con->prepare($update);

        try {
            // Ejecutar la consulta preparada, pasando los valores de los parámetros
            $stmt->execute([
                ':dni' => $dni,
                ':nombre' => $nombre,
                ':apellido1' => $apellido1,
                ':apellido2' => $apellido2,
                ':edad' => $edad,
                ':telefono' => $telefono
            ]);

            // Mostrar un mensaje de éxito si la actualización se realiza correctamente
            echo "Alumno actualizado exitosamente.";
        } catch (PDOException $ex) {
            // Capturar y manejar cualquier excepción que ocurra durante el proceso de actualización
            die("Error al actualizar alumno: " . $ex->getMessage());
        }
    }


    // 	* Eliminar. Que recibirá como parámetro el Dni de un alumno y lo eliminará de la base de datos.
    public function deleteAlumno($dni)
    {
        // Consulta SQL para eliminar el alumno de la tabla de alumnos
        $delete = "DELETE FROM Alumnos WHERE Dni = :dni";

        // Preparar la consulta SQL utilizando PDO
        $stmt = $this->con->prepare($delete);

        try {
            // Ejecutar la consulta preparada, pasando el valor del parámetro DNI
            $stmt->execute([':dni' => $dni]);

            // Mostrar un mensaje de éxito si la eliminación se realiza correctamente
            echo "Alumno eliminado exitosamente.";
        } catch (PDOException $ex) {
            // Capturar y manejar cualquier excepción que ocurra durante el proceso de eliminación
            die("Error al eliminar alumno: " . $ex->getMessage());
        }
    }


    // 	* Obtener. Que recibirá como parámetro un Dni y retornará un objeto de tipo alumno
    public function getAlumnoByDni($dni)
    {
        // Consulta SQL para obtener los datos del alumno utilizando su DNI
        $query = "SELECT Dni, Nombre, Apellido1, Apellido2, Edad, Telefono FROM Alumnos WHERE Dni = :dni";

        // Preparar la consulta SQL utilizando PDO
        $stmt = $this->con->prepare($query);

        try {
            // Ejecutar la consulta preparada, pasando el valor del parámetro DNI
            $stmt->execute([':dni' => $dni]);

            // Obtener el resultado de la consulta como un array asociativo
            $alumno = $stmt->fetch(PDO::FETCH_ASSOC);

            // Retornar los datos del alumno
            return $alumno;
        } catch (PDOException $ex) {
            // Capturar y manejar cualquier excepción que ocurra durante el proceso
            die("Error al obtener alumno por DNI: " . $ex->getMessage());
        }
    }
}
