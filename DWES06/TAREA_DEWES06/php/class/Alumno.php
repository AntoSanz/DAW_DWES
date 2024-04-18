<?php

class Alumno extends DB

{
    public function __construct($base)
    {
        parent::__construct($base);
    }

    public function __destruct()
    {
        // Cerrar la conexión a la base de datos al destruir el objeto
        parent::Cerrar();
    }

    //Consultas DB
    
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

    public function getAlumnosListFiltered($inputValue) {
        // Definir la consulta SQL
        $query = "SELECT Dni, Nombre, Apellido1, Apellido2 FROM Alumnos WHERE Nombre LIKE ?";
        
        try {
            // Preparar la consulta SQL utilizando PDO
            $stmt = $this->con->prepare($query);
            
            // Enlazar el valor de $inputValue al marcador de posición
            $param = "%$inputValue%";
            $stmt->bindParam(1, $param, PDO::PARAM_STR);
            
            // Ejecutar la consulta preparada
            $stmt->execute();
            
            // Obtener los resultados
            $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Devolver la lista de alumnos filtrada
            return $alumnos;
        } catch (PDOException $ex) {
            die("Error al recuperar: " . $ex->getMessage());
        }
    }
}