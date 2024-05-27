// Inicializa la animación Lottie
var lottieCarContainer = document.getElementById('lottie-car');

// Cargar la animación
var animation = lottie.loadAnimation({
    container: lottieCarContainer, // ID del contenedor
    renderer: 'svg', // Renderizado como SVG
    loop: true, // Animación en bucle
    autoplay: true, // Autoplay habilitado
    path: '../Recursos/JSON/coche.json', // Ruta al archivo JSON de la animación
    rendererSettings: {
        preserveAspectRatio: 'xMidYMid slice'
    }
});

// Obtener los elementos para alternar
const linkCoche = document.getElementById('link-coche');
const textOverlay = document.getElementById('text-overlay');

// Agregar eventos para alternar la visibilidad
linkCoche.addEventListener('mouseover', () => {
    lottieCarContainer.style.display = 'none';
    textOverlay.style.display = 'flex';
});

linkCoche.addEventListener('mouseout', () => {
    lottieCarContainer.style.display = 'flex';
    textOverlay.style.display = 'none';
});