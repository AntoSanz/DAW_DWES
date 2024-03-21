<?php

class Alumno extends DB{
    private $dni;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $edad;
    private $telefono;
    
    public function __construct($base){
        // $this->dni=$n;
        // $this->nombre=$n;
        // $this->apellido1=$a1;
        // $this->apellido2=$a2;
        // $this->edad=$e;
        // $this->telefono=$t;
        parent::__construct($base);
    }
    public function __destruct() {
        
    }
    //Consultas DB
    // 	* Listar. Que listará todos los registros de la tabla alumnos.
    public function getAlumnosList(){
        // Definir la consulta SQL
        $query = "SELECT Dni, Nombre, Apellido1, Apellido2, Edad, Telefono FROM Alumnos";
        // Preparar la consulta SQL utilizando PDO
        $stmt = $this->con->prepare($query);
        
        try{
            // Ejecutar la consulta preparada
            $stmt->execute();
            $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $alumnos;
        }catch(PDOException $ex){
            die("Error al recuperar: ".$ex->getMessage());
        }
    }

	// 	* Insertar. Que recibirá como parámetro un objeto de tipo alumno y deberá insertar sus datos en la tabla.
	public function createAlumno($dni, $nombre, $apellido1, $apellido2, $edad, $telefono)
	{
        // Definir la consulta SQL
        $query = "INSERT INTO Alumnos (Dni, Nombre, Apellido1, Apellido2, Edad, Telefono) VALUES (?, ?, ?, ?, ?, ?)";
        // Preparar la consulta SQL utilizando PDO
        $stmt = $this->con->prepare($query);
        $stmt->execute([$dni, $nombre, $apellido1, $apellido2, $edad, $telefono]);
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

?>