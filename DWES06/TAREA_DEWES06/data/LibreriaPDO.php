<?php

//Clase que me permite acceder a BBDD

class DB {

//Definimos propiedades para establecer los parámetros de conexión    
    
private $host="localhost";
private $dbname;
private $user="root";
private $pass="";
private $db;    //Propiedad para guardar el objeto PDO

public $filas=array();   //Propiedad pública para guardar el resultado de la consultas de seleccion

public function __construct($base)
{
    $this->dbname=$base;  //Al instanciar el objeto DB establecemos la BBDD en la que vamos a trabajar
}

private function Conectar()
        {
            try
            {
                $this->db =new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user,$this->pass);    //Creamos la conexion
                $this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);     // Establecemos parametro básicos de configuaracion
                $this->db->exec("set names utf8mb4");
                
            } catch(PDOException $e) {                                          //Controlamos si se ha producido una excepción
                
                echo  "  <p>Error: No puede conectarse con la base de datos.</p>\n\n";
                echo  "  <p>Error: " . $e->getMessage() . "</p>\n";
                
            }


        }
private function Cerrar()
        {
            $this->db=NULL;
        }
        
public function ConsultaSimple($consulta,$param)
       {
           $this->Conectar();
            
           $sta=$this->db->prepare($consulta);
           
           if (!$sta->execute($param))
           {
             echo "Error al ejecutar la consulta";  
           }
           
           
           $this->Cerrar(); 
       } 
public function ConsultaDatos($consulta,$param)
       {
           $this->Conectar();
           
           $sta=$this->db->prepare($consulta);
           
           if (!$sta->execute($param))
           {
               echo "Error al ejecutar la consulta";
           }
           else //Gurdamos el resultado de la consulta en filas
           {
               $this->filas=array();  //Inicializamos el array para borrar posibles filas de consultas anteriores
               
               foreach($sta as $fila) //Sacamos las filas del objeto statement y las guardamos en un array
               {
                   $this->filas[]=$fila;
               }
               
           }
           
           $this->Cerrar();
       } 
        
        
}

?>