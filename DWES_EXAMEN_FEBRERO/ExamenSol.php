<?php

require_once 'LibreriaPDO.php';  //Incluimos el archivo de libreria que realice la conexión y ejecute las consultas

$db = new DB("febreroe");  //Instanciamos la clase DB para acceder a esa base de datos


function ProductosArchivo()  //Funcion que devuelve en un array los datos del archivo Pedidos.txt
{
    $productos=array();      //Declaramos un array para obtener las filas de lo productos pedidos
   
    if (file_exists("Pedidos.txt") )
    { 
        $fd=fopen("Pedidos.txt","r");     //Abrimos el archivo pedidos
    
            while (!feof($fd) )
            {
              $linea=fgets($fd);
              
              $campos=explode(" ",$linea);
              
                  if (count($campos)==4 ) //Para evitar posibles problemas con caractares especiales muestre lineas "falsas"
                  {
                      $productos[$campos[0]]=$campos; //La clave será el Id el valor un array con todos los campos
                  }
            
            }
            
       fclose($fd);
    
    }
    
    return $productos;
    
}


$fami="";  //Por defecto no hay ninguna familia seleccionada

if (isset($_POST['familia']) )  //Salvo que la recibamos tras un autoenvio/recarga de la página
{
    $fami=$_POST['familia'];

}

?>

<!DOCTYPE html>
<html lang="es">


<body>

    <form name='f1' action='<?php echo $_SERVER['PHP_SELF']; ?>'  method='post'>
        <label>Familia : </label>
        <select  name="familia">
            <option value=""></option>
            <?php 

             $consulta="select * from familias";   //Cargamos los datos de las familias

             $param=array();

             $db->ConsultaDatos($consulta,$param);

             foreach($db->filas as $fila) 
             {
                echo "<option value='$fila[cod]' ";

                if ($fila['cod']==$fami)      //En caso de que el código de familia coincida con la seleccionada en la recarga anterior
                {
                    echo " selected ";        //dejamos seleccionada esta opción
                }

                echo ">$fila[nombre]</option>";
             }

            ?>
              
        </select>
        <br>
        <button type="submit" name='Mostrar' value='Mostrar'>Mostrar</button>
        <button type="submit" name='Stock' value='Stock'>Stock</button>
        <button type="submit" name='Comprar' value='Comprar'>Comprar</button>
       
   <?php 
   
   if (isset($_POST['Mostrar']) )   //Si hemos seleccionado mostrar los productos
   {     
       
       echo " <fieldset><legend>Mostramos los productos</legend>";
       
       //Recuperamos con una consulta los productos de esa familia
       
       $consulta="SELECT p.*
                  FROM   productos p
                  where  p.familia=:familia";
       
       $param=array(":familia"=>$fami); //Insertamos los datos en el array de parñametros de sustitución
       
       $db->ConsultaDatos($consulta, $param);
       
       echo "<table border='2'>";
       echo "<th>Selec</th><th>Nombre</th><th>Nombre Corto</th><th>Descripcion</th><th>PVP</th><th>Familia</th>";;
       
       foreach($db->filas as $fila)
       {
          echo "<tr>"; 
          
          echo "<td><input type='checkbox' name=Selec[".$fila['id']."]></td>";  //LLamamos a los checkbox como un array cuya clave es el código de ese producto
          
          echo "<td>".$fila['nombre']."</td>";
          echo "<td>".$fila['nombre_corto']."</td>";
          echo "<td>".$fila['descripcion']."</td>";
          echo "<td>".$fila['pvp']."</td>";
          echo "<td>".$fila['familia']."</td>";
              
          echo "</tr>"; 
       }
   
       
       echo "</table>";
       
       echo "</fieldset>"; 
       
   }
   
   
   if ( isset($_POST['Stock']) && (isset($_POST['Selec']) ) )   //Si hemos seleccionado consultar Stock y marcado algun check
   {
       
       $selec=$_POST['Selec']; //Recogemos los códigos de los productos marcados
       
       echo " <fieldset><legend>Stock de los productos seleccionados</legend>";
       
       //Recuperamos con una consulta los productos de esa familia
       
       $consulta="SELECT p.nombre_corto, sum(unidades) as total
                  FROM stocks s, productos p
                  where s.producto=p.id and p.id IN (";
       
       //Tenemos que crear un array con los códigos de los productos marcados como parámetros de sustitución
      
       $param=array();
       
       $i=1;
       
       foreach ($selec as $Id=>$valor)  //Tenermos que insertar en el array de parámetro de sustitución los Id de los productos marcados
       {
           $param[":Id$i"]=$Id;
           $i++;
           
       }
       
       $IdProductos=array_keys($param); //Cogemos las claves del array de parñametros, que son los alias de los parñametros de sustitución
       
       $Productos=implode(",",$IdProductos); //Lo convertimos en una cadena con la coma como separador para incluirlos dentro de la clausula in
       
       $consulta.=$Productos.") GROUP by producto";
        
       echo $consulta;
       
       $db->ConsultaDatos($consulta, $param);
       
       echo "<table border='2'>";
       echo "<th>Nombre</th><th>Unidades</th>";;
       
       foreach($db->filas as $fila)
       {
           echo "<tr>";
      
           echo "<td>".$fila['nombre_corto']."</td>";
           echo "<td>".$fila['total']."</td>";
           
           echo "</tr>";
       }
       
       echo "</table>";
       
       echo "</fieldset>"; 
       
       
   }
   
   if ( isset($_POST['Comprar'])  && (isset($_POST['Selec']) )  )   //Si hemos seleccionado guardar en el archivo y hay productos seleccionados
   {
         $selec=$_POST['Selec']; //Recogemos los códigos de los productos marcados
       
         $ProductosPed=array();  //Array con los datos de los productos que vamos a insertar
       
         $param=array();
         
         //Recuperamos los datos de los productos marcados
         
         foreach ($selec as $Id=>$valor)
         {
            $consulta="SELECT id,nombre_corto,PVP FROM productos where id=:Id";
             
            $param[":Id"]=$Id;
            
            $db->ConsultaDatos($consulta, $param);
            
            $fila=$db->filas[0];
            
            $ProductosPed[$Id]=$fila;
         }
         
         //Comprobamos si los productos pedidos estaban o no en el archivo
         
         $Productos=ProductosArchivo(); 
         
         foreach ($ProductosPed as $Id=>$filaPed) 
         {
             if (!array_key_exists($Id, $Productos) )   //Si es producto pedido no estaba en el archivo
             {
                 $fila=array();
                 
                 $fila[0]=$Id;
                 $fila[1]=$filaPed["nombre_corto"];
                 $fila[2]=$filaPed["PVP"];
                 $fila[3]=1;            //Le añadimos a la fila un campo nuevo con el valor del contador
                 
                 $Productos[$Id]=$fila; //Insertamos la fila en el array productos
             }
             else //Si ese producto ya estaba en el archivo
             {               
                 $fila=$Productos[$Id];   //Recuperamos esa fila para ese producto
                 
                 $fila[3]=$fila[3]+1; //Incrementamos el campo del contador
                 
                 $Productos[$Id]=$fila;   //Volvemos a guardar la fila
                 
             }
         }
         
         $fd=fopen("Pedidos.txt","w");  //Abrimos el archivo en modo escritura, para sobreescribir el contenido 
         
         foreach ($Productos as $Id=>$fila)  //Guardamos los productos con sus cantidades correspondientes en el archivo
         {
             $linea=implode(" ",$fila);
             
             $linea.="\r\n";
             
             fputs($fd,$linea);
             
         }
         
         fclose($fd);
         
   }
   
   ?>
              
   </form>
   
</html>