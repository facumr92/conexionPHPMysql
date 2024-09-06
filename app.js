const formularioBusqueda = document.getElementById("form-buscar-usuario");
const resultadoDiv = document.getElementById('resultado');

formularioBusqueda.addEventListener("submit", consultar_en_tiempo_real);

function consultar_en_tiempo_real(evento) {
    
    // Evita que se recargue la página
    evento.preventDefault();

    // Obtener el ultimo valor del input
    const nombre_usuario = document.getElementById("usuario").value;

    //se crea un objeto para tomar los valores del formulario
    const formData = new FormData();
    formData.append('usuario', nombre_usuario);
    formData.append('envio', true);

    // se le pasa al fetch el endpoint que genera la consulta de busqueda
    fetch('RF_buscar_user.php', {
        method: 'POST',
        body: formData
    })

    //se toma la respuesta y se devuelve en formato json
    .then(response => response.json())
    //la variable data se usa para recorrer el array asociativo del endpoint...
    .then(data => {
        
        resultadoDiv.innerHTML = ''; // Limpia el contenido previo

        //si el enpoint devuelve 1...
        if (data.status === 1) {
            data.usuarios.forEach(user => {
                // se agrega html dentro del div que contiene el mensaje de respuesta
                resultadoDiv.innerHTML += `<p>ID: ${user.id} - Nombre: ${user.nombre} - Email: ${user.email}</p><hr>`;
            });
        } else {
            resultadoDiv.innerHTML = `<p>${data.mensaje}</p>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
