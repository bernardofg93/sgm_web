const formularioRegister = document.querySelector("#formRegister");

eventListener();

function eventListener() {
    formularioRegister.addEventListener('submit', readForm);
}

function readForm(e) {
    e.preventDefault();
    const us_nombre = document.querySelector('#us_nombre').value,
          us_apellidos = document.querySelector('#us_apellidos').value,
          correo = document.querySelector('#correo').value,
          password = document.querySelector('#password').value
          action = document.querySelector('#action').value;

          if(us_nombre === '' || us_apellidos === '' || correo === '' || password === '') {
              mostrarNotificacion('Todos los campos son obligatorios', 'error');
          }else{
            const data = new FormData();
            data.append('nombre', us_nombre);
            data.append('apellidos', us_apellidos);
            data.append('correo', correo);
            data.append('password', password);
            data.append('action', action);

            if(action == 'insert'){
                insertBD(data);
            }else{
                           }
          }
          function insertBD(data){
            const xhr = new XMLHttpRequest();
            xhr.open("POST", 'http://localhost/sergio_magana/usuario/save', true);
            xhr.send(data);
            xhr.onload = function(){
                if(this.status === 200) {
                    //leemos la respuesta php
                    mostrarNotificacion('Registro creado correctamente', 'correcto');
                    formularioRegister.reset();
                }
            }
        }

        //mostrar notificaion
        function mostrarNotificacion(mensaje, clase) {
            //creamos un div
            const notificacion = document.createElement('div');
            // se le agrega una clase al div
            notificacion.classList.add(clase, 'notificacion', 'sombra');
            //agregamos el mensaje
            notificacion.textContent = mensaje;
            //conseguimos el formulario
            formularioRegister.insertBefore(notificacion, document.querySelector('form legend'));
            //ocular y mostar la notificacion
            setTimeout(() => {
                notificacion.classList.add('visible');
                setTimeout(() => {
                    notificacion.classList.remove('visible');
                    notificacion.remove();
                }, 3000)
            }, 100)
        
        }
    }

