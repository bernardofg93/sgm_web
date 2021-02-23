// pasos para la creación de un request

var btnCargar = document.getElementById('cargar');

function cargarContenido() {
  // crearlo
  var xhr = new XMLHttpRequest();

  // abrirlo
   xhr.open("GET",'http://localhost/sergio_magana/product/table', true);
   xhr.send(); 
   // revisar que cambie
   xhr.onreadystatechange = function() {
      //console.log(xhr.readyState);
      
      if(xhr.readyState == 4 && xhr.status == 200) {
          //console.log("Se cargo correctamente");
          console.log('1');
          var json = JSON.parse(xhr.responseText);
          var contenido = document.getElementById('contenido');
          contenido.innerHTML = json.fullstack;
      } 
   };
}

btnCargar.addEventListener('click', cargarContenido );

