
const listadoContactos = document.querySelector('#listado-contactos .click'); 


eventListener();

function eventListener() {
    listadoContactos.addEventListener('click', deleteAddress);
}

function deleteAddress(e) {
    console.log(e.target.parentElement);
    //console.log(e.target); que elemento estas seleccionando
    //console.log(e.target.classList.contains('btn-borrar'));
    if (e.target.classList.contains('btn-borrar')) {
        //tomar el id
        const id = e.target.getAttribute('data-id');
        //console.log(id);
        // preguntar al usuario
        const respuesta = confirm('Are you sure ?');

        if (respuesta) {
            const xhr = new XMLHttpRequest();

            xhr.open('GET',`http://localhost/sergio_magana/addres/delete&id=${id}`, true);

            xhr.onload = function() {
                if (this.status === 200) {
                    const json = JSON.parse(xhr.responseText);
                     console.log(json);
                    
                     if (json.result == 'true') {
                        e.target.parentElement.parentElement.remove();

                        mostrarNotificacion('address removed successfully !', 'correcto');
                    } else {
                        mostrarNotificacion('There was an unexpected error', 'error');
                    }
                }
            }
            xhr.send();
        }
    }
  
}

// Notifación en pantalla
function mostrarNotificacion(mensaje, clase) {
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;

    // formulario
    listadoContactos.insertBefore(notificacion, document.querySelector('legend legend'));

    // Ocultar y Mostrar la notificacion
    setTimeout(() => {
         notificacion.classList.add('visible');
         setTimeout(() => {
              notificacion.classList.remove('visible');           
              setTimeout(() => {
                   notificacion.remove();
              }, 500)
         }, 3000);
    }, 100);
}
