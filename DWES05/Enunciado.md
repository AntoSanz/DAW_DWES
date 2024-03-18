# Tarea para DWES05.
Sobre la tabla Alumnos.sql que se le facilita deberá crear una clase Alumno.php y un DAO(Data Access Object) asociado que permita realizar un CRUD(página que permite realizar las operaciones típicas de mantenimiento) sobre dicha tabla. Para realizar el Dao deberá emplear como base la clase DB que esta dentro del archivo LibreriaPDO.php que se le facilita.

El DAO deberá implementar los siguientes métodos:
* Insertar. Que recibirá como parámetro un objeto de tipo alumno y deberá insertar sus datos en la tabla.
* Actualizar. Recibirá también un objeto de tipo alumno y actualizará sus datos en la tabla.
* Eliminar. Que recibirá como parámetro el Dni de un alumno y lo eliminará de la base de datos.
* Obtener. Que recibirá como parámetro un Dni y retornará un objeto de tipo alumno
* Listar. Que listará todos los registros de la tabla alumnos.

Posteriormente deberá crear una página llamada Crud.php que empleando el Dao anterior, permita realizar todas estas acciones por parte del usuario a través de elementos de la página web.

# Observaciones
La tarea se la calificará de 0-10 atendiendo a los criterios siguientes:
* Funciona correctamente y resuelve lo que se ha pedido
* Construye la interfaz del formulario HTML correctamente
* Realiza el envío y recepción adecuadamente de los datos de la página.
* Emplea correctamente el lenguaje Php.
* El algoritmo y pasos realizados son los apropiados.
* Maneja adecuadamente los tipos de datos en el lenguaje Php