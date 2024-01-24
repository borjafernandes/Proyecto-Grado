
const boton = document.getElementById('mostrarImagen');
const imagen = document.getElementById('imagencentro');

// Establecer el estado inicial de la imagen (oculta)
imagen.style.display = 'none';

boton.addEventListener('click', function () {
    if (imagen.style.display === 'none') {
        imagen.style.display = 'block';
    } else {
        imagen.style.display = 'none';
    }
});

