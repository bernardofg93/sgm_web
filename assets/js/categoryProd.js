const formCatProduct = document.querySelector('#formCatProduct');

eventListener();

function eventListener() {
    formCatProduct.addEventListener('submit', readFormCategory);
}

function readFormCategory(e) {
    e.preventDefault();

    //obtener datos del forumario
    const nombre_cat_productos = document.querySelector('#nombre_cat_productos').value,
        action = document.querySelector('#action').value;

    //crear arreglo de datos append
    const data = new FormData();
    data.append('nombre_cat_productos', nombre_cat_productos);
    data.append('action', action);

    if (action == 'create') {
        insertBD(data);
    } else {
        //editar
    }

    function insertBD(data) {
        xhr = new XMLHttpRequest();

        xhr.open('POST', 'http://localhost/sergio_magana/categoryProd/save', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if ((xhr.status >= 200 && xhr.status <= 200) || xhr.status == 304) {

                    if (xhr.responseText != "") {
                        formCatProduct.reset();
                    }
                }
            }
        }
        xhr.send(data);
        return true;
    }
}