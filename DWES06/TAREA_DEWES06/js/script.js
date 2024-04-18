document.addEventListener('DOMContentLoaded', function () {
    const inputField = document.getElementById('alumn-name');

    inputField.addEventListener('input', function (event) {
        let inputValue = event.target.value;

        obtenerAlumnos(inputValue)
            .then(respuesta => {
                debugger;
                console.log(respuesta); // Aquí puedes procesar la respuesta como desees
            })
            .catch(error => {
                console.error(error); // Manejar cualquier error que ocurra durante la solicitud AJAX
            });
    });
});

function obtenerAlumnos(inputValue) {
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
                let respuesta = JSON.parse(xhr.responseText);
                resolve(respuesta);
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