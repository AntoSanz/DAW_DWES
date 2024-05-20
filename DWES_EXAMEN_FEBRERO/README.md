# Examen Programación Entorno Servidor

## Enunciado
Deberá crear una BBDD llamada FebreroE y a continuación importar las tablas del archivo FebreroE.sql que le proporciona, posteriormente deberá crear una página llamada Consulta.php que deberá implementar la siguiente funcionalidad:
* Al cargar la página, mostrará un desplegable cargado con los nombres de las familias de los productos, pero sin dejar ninguna familia seleccionada por defecto. 
* Debajo del desplegable listará todos los productos de la tienda en una tabla, en el caso de que no se hubiese seleccionado ninguna familia del desplegable, y en caso contrario, unicamente los productos que pertenezcan a la familia seleccionada. 
Para cada producto se mostrará unicamente su nombre_corto y el precio, pero antes del nombre corto deberá situarse un control de tipo checkbox que deberá permitir elegir ese producto en cuestión.
* Si marcamos el checkbox de uno o varios productos y pulsamos en un botón llamado “Stock” deberá recargar la página y mostrar el stock que hay disponible para esos producto/s en cada una de las tiendas.
* Si marcamos uno o varios productos y pulsamos en un botón “Comprar”, insertará en un archivo de texto llamado Pedidos.txt el id, nombre_corto y el precio de ese producto (separados cada campo por un espacio en blanco) en una linea diferente para cada producto checkeado. En el caso de que se pidiese un producto más de una vez, deberá insertarse al final de la linea correspondiente a ese producto, un número que representará el contador de las veces que ese producto ha sido pedido.  Observaciones:   Para conectar y acceder a la BBDD se debe usar unicamente la clase PDO.  No es necesario incluir ningún tipo de estilo CSS a la página, no se prohíbe hacerlo  pero no se valorará ni se tendrá cuenta en absoluto.

## Observaciones:  
* Para conectar y acceder a la BBDD se debe usar unicamente la clase PDO. 
* No es necesario incluir ningún tipo de estilo CSS a la página, no se prohíbe hacerlo  pero no se valorará ni se tendrá cuenta en absoluto.