var originalResults = document.getElementById('originalResults').innerHTML;

function sendSearchRequest() {
    // Obtener el valor del campo de búsqueda de nombre
    var searchNombre = document.getElementById('searchNombre').value.trim();
    // Obtener el valor del campo de búsqueda de marca
    var searchMarca = document.getElementById('searchMarca').value.trim();
    // Obtener el valor del campo de búsqueda de precio
    var searchPrecio = document.getElementById('searchPrecio').value.trim();

    // Realizar una solicitud AJAX al servidor
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Actualizar los resultados de la búsqueda en el contenedor
            document.getElementById('searchResults').innerHTML = this.responseText;
            document.getElementById('originalResults').style.display = 'none';
        }
    };
    // Enviar la solicitud al archivo que manejará la búsqueda en el servidor
    xhttp.open("GET", "searchCoche.php?nombre=" + searchNombre + "&marca=" + searchMarca + "&precio=" + searchPrecio, true);
    xhttp.send();
}

document.getElementById('searchNombre').addEventListener('input', sendSearchRequest);
document.getElementById('searchMarca').addEventListener('input', sendSearchRequest);
document.getElementById('searchPrecio').addEventListener('input', sendSearchRequest);
