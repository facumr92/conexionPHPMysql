//selecciono el formulario que tiene los datos a enviar
const formulario = document.querySelector('form');

// Usando selectores para los inputs
const input_nombre = document.querySelector("#nombre");
const input_apellido = document.getElementById("apellido");
const input_email = document.getElementById("email");
const input_pass = document.getElementById("pass");

const datos = { input_nombre, input_apellido, input_email, input_pass };

formulario.addEventListener("submit", validar_campos);

function validar_campos(evento) {
    let es_valido = true;

    // recorro el array datos que tiene todos los inputs
    for (let campo in datos) {
        //compruebo si los campos estan vacíos, además recorto los espacios con trim
        if (datos[campo].value.trim() === '') {
            alert("Todos los campos son obligatorios");
            es_valido = false;
            break;
        }
    }

    // Si no es válido, prevenir el envío del formulario con preventDefault()
    if (!es_valido) {
        evento.preventDefault();
    }
}
