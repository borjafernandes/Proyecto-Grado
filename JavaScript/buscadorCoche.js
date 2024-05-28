var originalResults = document.getElementById('originalResults').innerHTML;

function sendSearchRequest() {
    var searchNombre = document.getElementById('searchNombre').value.trim();
    var searchMarca = document.getElementById('searchMarca').value.trim();
    var searchPrecio = document.getElementById('searchPrecio').value.trim();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('searchResults').innerHTML = this.responseText;
            document.getElementById('originalResults').style.display = 'none';
        }
    };
    xhttp.open("GET", "searchCoche.php?nombre=" + encodeURIComponent(searchNombre) + "&marca=" + encodeURIComponent(searchMarca) + "&precio=" + encodeURIComponent(searchPrecio), true);
    xhttp.send();
}

function updatePrecioInput(value) {
    document.getElementById('precioValue').textContent = value;
    document.getElementById('searchPrecio').value = value; // actualiza el valor oculto de precio
    sendSearchRequest();
}

document.getElementById('searchNombre').addEventListener('input', sendSearchRequest);
document.getElementById('searchMarca').addEventListener('input', sendSearchRequest);
document.getElementById('searchPrecioRange').addEventListener('input', function() {
    updatePrecioInput(this.value);
});