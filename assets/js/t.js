// pasos para la creación de un request
var btnCargar = document.getElementById('cargar');

function cargarContenido() {
  // crearlo
  var xhr = new XMLHttpRequest();

  // abrirlo
   xhr.open('GET', 'http://localhost/sergio_magana/product/table', true);
   xhr.send(); 
   // revisar que cambie
   xhr.onreadystatechange = function() {
      //console.log(xhr.readyState);
      if(xhr.readyState == 4 && xhr.status == 200) {
          //console.log("Se cargo correctamente");
          console.log('entre');
          var json = xhr.responseText;
                 t = JSON.parse(json);
                 console.log(t.frontend);
          
   };
}
}
btnCargar.addEventListener('click', cargarContenido );
