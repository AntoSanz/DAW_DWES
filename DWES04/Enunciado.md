Deberá crear una base de datos llamada Tarea4 e importar las tablas usuarios.sql y login.sql, posteriormente implementar utilizando variables de sesión un formulario de login.


* La tabla usuarios.sql guarda los datos de los usuarios registrados, tiene como campos el nombre de un usuario y la clave de este codificada con la función sha1.

* La tabla login.sql guarda los intentos de login que ha realizado cada usuario, tiene como campos el nombre de usuario y clave introducida en ese intento, la hora en formato Epoch de ese intento y si el acceso ha sido concendido “C” o denegado “D”.

* Deberá hacer una página que implemente un control de acceso a una página llamada principal.php, esta página no debe hacer nada, simplemente si el login es correcto deberá redireccionarnos a ella.

* Si el login es incorrecto indicará con el mensaje “Usuario/Clave” incorrecto y recargará la página para que lo intente de nuevo, pero si un usuario falla 5 veces en menos de 3 minutos deberá bloquearlo durante 10 minutos.

* Tanto si el login es correcto como si no lo es deberá registrar ese intento en la tabla login.sql.

* Deberá emplear sesiones para evitar que si se accede a la página principal.php sin autenticarse correctamente esta no debe mostrarse, y deberá redireccionarlo a la página de login.