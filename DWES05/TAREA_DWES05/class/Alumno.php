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
	public  function updateDBAlumno()
	{
		echo "update";
	}

	// 	* Eliminar. Que recibirá como parámetro el Dni de un alumno y lo eliminará de la base de datos.
	public function deleteAlumno()
	{
		echo "delete";
	}
	
	// 	* Obtener. Que recibirá como parámetro un Dni y retornará un objeto de tipo alumno
	public function getAlumnoByDni()
	{
		echo "get";
	}
}

?>