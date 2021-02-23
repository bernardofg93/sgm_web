const formulario = document.querySelector('#forms');

eventListener();

function eventListener() {
    formulario.addEventListener('submit', forms);
}

function forms(e) {
    e.preventDefault();
    const nombre = document.querySelector('#nombre').value,
          descrip = document.querySelector('#descripcion').value,  
          price = document.querySelector('#precio').value, 
          stock = document.querySelector('#stock').value,
          oferta = document.querySelector('#oferta').value;
          
          const data = new FormData();

          data.append('nombre', nombre);
          data.append('descrip', descrip);
          data.append('price', price);
          data.append('stock', stock);
          data.append('oferta', oferta);

          insertarBD(data);       
}

function insertarBD(data) {
    //crear objeto ajax
    const xhr = new XMLHttpRequest();

    //abrir conexion
    xhr.open('POST', 'http://localhost/sergio_magana/admin/test', true);

    //pasar los datos
    xhr.onload = function() {
        if(this.status === 200) {
            console.log(...data);
        }
    }

    xhr.send(data);
}