const formAddres = document.querySelector('#fm-addres'),
      listadoContactos = document.querySelector('#listado-contactos .click'); 

  

eventListener();

function eventListener() {
    formAddres.addEventListener('submit', readForm);
}

function readForm(e) {
    e.preventDefault();
    const pais = document.querySelector('#pais').value, 
          direccion = document.querySelector('#direccion').value,
          codigo_postal = document.querySelector('#codigo_postal').value,
          estado = document.querySelector('#estado').value,
          ciudad = document.querySelector('#ciudad').value,
          colonia = document.querySelector('#colonia').value,
          telefono = document.querySelector('#telefono').value,
          instrucciones = document.querySelector('#instrucciones').value,
          action = document.querySelector('#action').value;

          const data = new FormData();
          data.append('pais', pais);
          data.append('direccion', direccion);
          data.append('codigo_postal', codigo_postal);
          data.append('estado', estado);
          data.append('ciudad', ciudad);
          data.append('colonia', colonia);
          data.append('telefono', telefono);
          data.append('instrucciones', instrucciones);
          data.append('action', action);

          if (pais === '' || direccion === '' || codigo_postal === '' || estado === '' || ciudad === '' || colonia === '') {
                mostrarNotificacion('Please enter the required fields', 'error');
          } else {
            
            if (action === 'create') {
                addAddres(data);
            } else {
                  addres_id = document.querySelector('#addres_id').value;
                  data.append('addres_id', addres_id);
                  editAddres(data);  
            }

          }
}

function addAddres(data) {
    //crear el objeto ajax
    const xhr = new XMLHttpRequest();
    //abrir la conexion
    xhr.open('POST', 'http://localhost/sergio_magana/addres/save', true);
    xhr.onload = function() {
        if (this.status === 200) {
            const json = JSON.parse(xhr.responseText);
            if (json.result === 'true') {
                mostrarNotificacion('Address created correctly !', 'correcto');
            } else {
                mostrarNotificacion('There was an unexpected error', 'error');
            }
        }
    };
    xhr.send(data);
}

function editAddres(data) {
    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'http://localhost/sergio_magana/addres/save', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            const json = JSON.parse(xhr.responseText);
            if (json.result === 'true') {
                mostrarNotificacion('Address update correctly !', 'correcto');
            } else {
                mostrarNotificacion('There was an unexpected error', 'error');
            }
        }
    };
    xhr.send(data);
}

// Notifación en pantalla
function mostrarNotificacion(mensaje, clase) {
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;

    // formulario
    formAddres.insertBefore(notificacion, document.querySelector('form legend'));

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


