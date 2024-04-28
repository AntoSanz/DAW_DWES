document.addEventListener('DOMContentLoaded', function () {
    const inputField = document.getElementById('alumn-name');

    inputField.addEventListener('input', function (event) {
        let inputValue = event.target.value;

        obtenerAlumnosBD(inputValue)
            .then(res => {
                debugger;
                console.log(res);
                //Aqui se obtiene el array de objetos que viene de base de datos.
                //Se podría generar desde aqui la tabla con JS, pero para generarla con PHP hay que llamar a otra función que le pase los datos a PHP
                enviarDatosPHP(res)
            })
            .catch(error => {
                console.error(error);
            });
    });
});

function obtenerAlumnosBD(inputValue) {
    return new Promise((resolve, reject) => {
        // Crear una instancia de XMLHttpRequest
        let xhr = new XMLHttpRequest();

        // Configurar la solicitud AJAX
        let url = `./php/ajax_connect.php?inputValue=${encodeURIComponent(inputValue)}`;

        xhr.open('GET', url, true);

        // Configurar la función de callback que se ejecutará cuando la solicitud se complete
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Si la solicitud fue exitosa, resolver la promesa con los datos recibidos
                let res = JSON.parse(xhr.responseText);
                resolve(res);
            } else {
                // Si la solicitud falló, rechazar la promesa con un mensaje de error
                reject('Error al realizar la solicitud AJAX: ' + xhr.statusText);
            }
        };

        // Configurar la función de callback que se ejecutará en caso de error
        xhr.onerror = function () {
            reject('Error al realizar la solicitud AJAX');
        };

        // Enviar la solicitud AJAX
        xhr.send();
    });
}

function enviarDatosPHP(data){
      // Crear una nueva solicitud AJAX
      let xhr = new XMLHttpRequest();
      let url = './php/generar_tabla.php'; // Nombre del archivo PHP que generará la tabla

      xhr.open('POST', url, true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Insertar la tabla generada por PHP en el contenedor
            document.getElementById('table-container').innerHTML = xhr.responseText;
        } else {
            console.error('Error al realizar la solicitud AJAX: ' + xhr.statusText);
        }
    };

    xhr.onerror = function () {
        console.error('Error al realizar la solicitud AJAX');
    };

    // Convertir los datos a JSON y enviarlos en el cuerpo de la solicitud
    xhr.send(JSON.stringify(data));
}