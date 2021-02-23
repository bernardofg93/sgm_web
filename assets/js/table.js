var tbody = document.getElementById("tbody");
//se tagea la etiqueta th y td para poder agarrar todas las unidades que existan en el dom 
var th = document.getElementById("thead").getElementsByTagName("th");
var td = document.getElementById("tbody").getElementsByTagName("td");

var i;

//vamos a asignar ancho a todos los mismos que el ancho de td
for (i = 0; i < td.length; i++) { // width for td's
    td[i].style.width = td[i].clientWidth + "px";
}
for (i = 0; i < th.length; i++) {
    th[i].style.width = td[i].style.width;
}

// lets create new table, tr, td and div
var newtr = document.createElement("tr");
var newtd = document.createElement("td");

//se coloca un td dentro de un tr
newtr.appendChild(newtd); //append the td inside tr

var newDiv = document.createElement("div"); //crete new div
newDiv.id = "mainDiv"; // assign id to div
newtd.appendChild(newDiv); // append newDiv inside newtd


var newTable = document.createElement("table"); // create new table
newDiv.appendChild(newTable); // append new table inside newDiv

newTable.className = "table table-bordered table-hover m-0";
newTable.innerHTML = tbody.innerHTML; // copy the tbody in newTable

tbody.insertBefore(newtr, tbody.childNodes[0]); // insert in first tr of table

while (tbody.childNodes.length > 1) {
    tbody.removeChild(tbody.lastChild);
}

var childElemnts = document.getElementById("mainDiv").querySelector("table");
var numofRows = childElemnts.children[0].children[0].children.length;
newtd.colSpan = numofRows;
newtd.className = "p-0";

newDiv.style.height = "300px";

if (childElemnts.clientHeight >= "200") { // adding scroll bar to div
    newDiv.style.overflowY = "scroll";
} else {
    newDiv.style.overflowY = "auto";
}

// aligning the th's columns with td's columns equally
var lastColumn = parseInt(th[numofRows - 1].style.width);

for (i = 0; i < th.length; i++) {
    if (newDiv.style.overflowY == "scroll") {
        th[numofRows - 1].style.width = lastColumn + 17 + "px"; // 17px is width of the scroll bar
    } else {
        th[numofRows - 1].style.width = th[numofRows - 1].style.width; // if there is no  scroll bar
    }
}