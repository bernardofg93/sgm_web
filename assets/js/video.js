const videoForm =  document.querySelector('#formCatVideo');

eventListener();

function eventListener() {
    videoForm.addEventListener('submit', readForm);
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
    console.log(...data);
    createProduct(data);
    alert('crear');
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
