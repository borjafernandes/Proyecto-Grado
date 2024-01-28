function Menu() {
    const menu = document.querySelector('.menu');
    const nav = document.querySelector('.nav');
    menu.classList.toggle('active');
    nav.classList.toggle('active');
}

//cambiamos el fondo del video al hacer click en la galeria de imagenes
function cambiarVideo(name) {
    const videolist = document.querySelectorAll('.video');
    const trailers = document.querySelectorAll('.trailer');
    const modelos = document.querySelectorAll('.modelo');

    videolist.forEach(video => {
        video.classList.remove('active');
        if (video.classList.contains(name)) {
            video.classList.add('active');
        }
    });

    modelos.forEach(modelo => {
        modelo.classList.remove('active');
        if (modelo.classList.contains(name)) {
            modelo.classList.add('active');
        }
    });

    trailers.forEach(video => {
        video.classList.remove('active');
        if (video.classList.contains(name)) {
            video.classList.add('active');
        }
    });

}

//cambiar el boton de pause a play y al reves
function cambiarBTN() {
    const play = document.querySelector('.play');
    const pause = document.querySelector('.pause');

    play.classList.toggle('active');
    pause.classList.toggle('active');
}

// poner play y pause al video de fondo
function pauseVideo() {
    const videolist = document.querySelectorAll('.video');

    videolist.forEach(video => {
        video.pause();
    });
    cambiarBTN();
}

function playVideo() {
    const videolist = document.querySelectorAll('.video');

    videolist.forEach(video => {
        video.play();
    });
    cambiarBTN();
}

function obtenerMcLaren() {
    const obtenerMcLarenEnlace = document.getElementById("obtenerMcLaren");

    obtenerMcLarenEnlace.addEventListener("click", function (event) {
        event.preventDefault(); // Evita que el enlace realice la acción por defecto (navegar a otra página)

        alert("No vas a tener un McLaren en tu vida. Mejor ponte a estudiar VAGO!!!!");

    });
}

