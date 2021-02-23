const formProduct = document.querySelector("#formProduct"),
     // editFormProduct = document.querySelector("#editFormProduct"),
      listProducts = document.querySelector('#list-products tbody');

eventListener();

function eventListener() {
  //listener para crear un producto
  formProduct.addEventListener("submit", readForm);

  listProducts.addEventListener('click', eliminarContacto);

}

function readForm(e) {
  e.preventDefault();
  const files = document.querySelector('[name=image]').files[0],
    nombre = document.querySelector('#nombre').value,
    descripcion = document.querySelector('#descripcion').value,
    precio = document.querySelector('#precio').value,
    stock = document.querySelector('#stock').value,
    oferta = document.querySelector('#oferta').value,
    selectCat = document.querySelector('#selectCat').value,
    action = document.querySelector('#action').value;

  if (nombre === '' || descripcion === '' || precio === '' || stock === '' || selectCat === '') {
    mostrarNotificacion('llenar los campos requeridos', 'error');
  } else {
    const data = new FormData();
    data.append('img', files);
    data.append('nombre', nombre);
    data.append('descripcion', descripcion);
    data.append('precio', precio);
    data.append('stock', stock);
    data.append('oferta', oferta);
    data.append('selectCat', selectCat);
    data.append('action', action);
    if(action === 'create'){
      createProduct(data);
    }else{
      //edit
      //leer el id
      alert('editar');
      const id_producto = document.querySelector('#id_producto').value;
      data.append('id_producto', id_producto);
      editProduct(data) 
    }
  }
}

//crate product
function createProduct(data) {
  //acrear objeto ajax
  const xhr = new XMLHttpRequest();
  //abrir conexion ajax
  xhr.open('POST', 'http://localhost/sergio_magana/product/save', true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const json = JSON.parse(xhr.responseText);
      //var contenido = document.getElementById('contenido');
      const newProduct = document.createElement('tr');
      newProduct.innerHTML = `
                <td>${json.nombre}</td>
                <td>${json.precio}</td>
                <td>${json.stock}</td>
                <td>${json.oferta}</td>
                `;

      //container para los botones
      const containerActions = document.createElement('td');

      //crear icono para editar
      const iconEdit = document.createElement('i');
      iconEdit.classList.add('fas', 'fa-edit');

      //crear el enlace para editar
      const btnEdit = document.createElement('a');
      btnEdit.appendChild(iconEdit);
      btnEdit.href = `http://localhost/sergio_magana/product/edit&id=${json.id}`;

      containerActions.appendChild(btnEdit);
      //crear icono de eliminar 
      const iconDelete = document.createElement('i');
      iconDelete.classList.add('fas', 'fa-trash-alt');

      //crear el enlace para eliminar
      const btnDelete = document.createElement('a');
      btnDelete.appendChild(iconDelete);
      btnDelete.setAttribute('data-id', json.id);
      btnDelete.classList.add('btn', 'btn-borrar');

      //agergarlo al padre
      containerActions.appendChild(btnDelete);
      
      //agregarlo al tr
      newProduct.appendChild(containerActions);
      
      //agregarlo con los productos
      listProducts.appendChild(newProduct);

      //notificacion
      mostrarNotificacion('Producto creado correctamente', 'correcto');

      //reset form
      formProduct.reset();

    }
  };
  xhr.send(data);
}

//editar producto
function editProduct(data) {
  //crear el objeto
  const xhr =  new XMLHttpRequest();
  // abrir la conexion
  alert('entra');
  xhr.open('POST', 'http://localhost/sergio_magana/product/save', true);
  // leer respuesta
  xhr.onload = function() {
    if (this.status === 200) {
        const json = JSON.parse(xhr.responseText);
        console.log(json);

        const image = document.querySelector('#img');
        image.src = `http://localhost/sergio_magana/uploads/images/products/${json.id_imgen}`;

        if(json.result === 'true') {
          mostrarNotificacion('Producto modificado correctamente', 'correcto');
        }else{
          mostrarNotificacion('Hubo un error', 'error');
        }

    }
  }
 xhr.send(data);
}
//eliminar el contacto
function eliminarContacto(e) {
  if (e.target.parentElement.classList.contains('btn-borrar')) {
    const id = e.target.parentElement.getAttribute('data-id');
    //console.log(id);
    //preguntar al usuario
    const respuesta = confirm("pregunta");

    if (respuesta) {
      // llamado a ajax
      const xhr = new XMLHttpRequest();

      //abrimos la conexion
      xhr.open('GET', `http://localhost/sergio_magana/product/delete&id=${id}`, true);

      //leer la respuesta
      xhr.onload = function () {
        if (this.status === 200) {
          const result = JSON.parse(xhr.responseText);
          if(result.result == 'true'){
            //console.log(e.target.parentElement.parentElement.parentElement);
            e.target.parentElement.parentElement.parentElement.remove();
          }
        }
      }
      xhr.send();
    }
  }
}

function mostrarNotificacion(mensaje, clase) {
  const notificacion = document.createElement('div');
  notificacion.classList.add(clase, 'notificacion', 'sombra');
  notificacion.textContent = mensaje;
  
  //form
  formProduct.insertBefore(notificacion, document.querySelector('form legend'));

  //ocultar y mostrar la notificacion
  setTimeout(() => {
    notificacion.classList.add('visible');
    setTimeout(() =>{
      notificacion.classList.remove('visible');
      setTimeout(() =>{
        notificacion.remove();
      }, 500)
    }, 3000);
  },100);
}