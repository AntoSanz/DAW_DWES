<?php
class DB
{
	protected $con;
	private $bbdd;
	private $host = "localhost";
	private $usu = "root";
	private $clave = "";
	public $datos; //Devolvera un array con los datos de la consulta

	//El constructor recibira el nombre de la BBDD a conectar y realizara la conexión
	public function __construct($base)
	{
		try {
			$this->bbdd = $base;
			$this->con = new PDO("mysql:host=$this->host;dbname=$this->bbdd", $this->usu, $this->clave);
			$this->con->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
			$this->con->exec("set names utf8mb4");
		} catch (PDOException $e) {
			echo "  <p>Error: No puede conectarse con la base de datos.</p>\n\n";
			echo "  <p>Error: " . $e->getMessage() . "</p>\n";

			exit();
		}
	}


	public function ConsultaSimple($consulta, $param)        //Para las consultas que no devuelvan datos
	{
		$sta = $this->con->prepare($consulta); //Preparamos la consulta

		if ($sta->execute($param)) {

			//echo "  <p>Consulta ejecutada correctamente.</p>\n";
		} else {
			echo "  <p>Eror en la consulta<p>\n";
		}
	}

	public function Consulta($consulta, $param)            //Para las consultas que devuelven datos 
	{
		$sta = $this->con->prepare($consulta);

		if ($sta->execute($param))         //Si la consulta no se ejecuta que muestre error
		{
			while ($fila = $sta->fetch()) {
				$this->datos[] = $fila;
			}
		} else {
			//Devolvemos los datos de la consulta en el array  
			echo "  <p>Eror en la consulta<p>\n";
		}
	}

	public function Cerrar()
	{
		$this->con = null;
	}

}