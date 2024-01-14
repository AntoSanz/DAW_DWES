# Descripción de la tarea
Partiendo de la base de datos 'proyecto' usada en los ejemplos y ejercicios de la unidad, se trata de programar un CRUD (create, read, update, delete) que permita gestionar los registros de la tabla 'productos'. 
La aplicación se dividirá en 5 páginas:
* listado.php. Mostrará en una tabla los datos código y nombre y los botones para crear un nuevo registro, actualizar uno existente, borrarlo o ver todos sus detalles.
* crear.php. Será un formulario para rellenar todos los campos de productos (a excepción del id). Para la familia nos aparecerá un "select" con los nombre de las familias de los productos para elegir uno (lógicamente aunque mostremos los nombres pro formulario enviaremos el código).
* detalle.php. Mostrará todo los detalles del producto seleccionado.
* update.php. Nos aparecerá un formulario con los campos rellenos con los valores del producto seleccionado desde "listado.php" incluido el select donde seleccionamos la familia.
* borrar.php. Será una página php con el código necesario para borrar el producto seleccionado desde "listado.php" un mensaje de información y un botón volver para volver a "listado.php".

Para acceder a la base de datos se debe usar PDO. Controlaremos y mostraremos los posible errores. Para los estilos se recomienda usar Bootstrap.

Pasaremos el código de producto por "get" tanto para "detalle.php" como para "update.php". Utilizando en el enlace "detalle.php?id=cod" .En ambas páginas comprobaremos que esta variable existe, si no redireccionaremos a "listado.php" para esto podemos usar "header('Location:listado.php')"

# Información de interés
## Recursos
Ordenador con un entorno AMP, instalado y configurado, un entorno de desarrollo como VSC con las extensiones adecuadas. Navegador con acceso a Internet, para poder consultar el manual online de PHP y poder tabajar online Bootstrap.
## Recomendaciones:
* Además del manual online de PHP, se recomienda dar libre acceso a Internet para la búsqueda de información.
* Para no repetir el código de la conexión a la base de datos en cada archivo, se recomienda crear el archivo conexion.php y utilizar require o require_once cada vez que lo necesitamos.
* Para borrar un producto, crea un formulario con el action apuntando a "borrar.php" y pasa por un campo oculto el código del producto a borrar.
* Recuerda que en el "option" del HTML "<option value="v">Nombre</option>",  "v" es el valor que pasamos, "Nombre" es lo que mostramos en la lista desplegable.

# Evaluacion de la tarea
* Se han analizado las tecnologías que permiten el acceso mediante programación a la información disponible en almacenes de datos.
* Se han creado aplicaciones que establezcan conexiones con bases de datos.
* Se ha recuperado información almacenada en bases de datos.
* Se ha publicado en aplicaciones Web la información recuperada.
* Se han utilizado conjuntos de datos para almacenar la información.
* Se han creado aplicaciones Web que permitan la actualización y la eliminación de información disponible en una base de datos.
* Se han utilizado transacciones para mantener la consistencia de la información.
* Se han probado y documentado las aplicaciones.