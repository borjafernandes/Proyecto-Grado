// Inicializa la animación Lottie
var currentAnimation;
var lottieContainer = document.getElementById('lottie-container');

function loadAnimation(path) {
    // Destruir la animación actual si existe
    if (currentAnimation) {
        currentAnimation.destroy();
        currentAnimation = null;
    }

    // Limpiar el contenido del contenedor
    lottieContainer.innerHTML = '';

    // Cargar la nueva animación
    currentAnimation = lottie.loadAnimation({
        container: lottieContainer, // ID del contenedor
        renderer: 'svg', // Renderizado como SVG
        loop: true, // Animación en bucle
        autoplay: true, // Autoplay habilitado
        path: path, // Ruta al archivo JSON de la animación
        rendererSettings: {
            preserveAspectRatio: 'xMidYMid slice'
        }
    });

    // Log para depuración
    // console.log('Animación cargada:', path);
}

// Cargar la animación inicial
loadAnimation('../Recursos/JSON/luna.json'); // Cambia esta ruta a tu archivo JSON de la animación de luna

const btnCambiarIcono = document.getElementById('iconoluna');
const btnCambiar = document.getElementById('btncambiarmodo');

btnCambiar.addEventListener('change', (event) => {
    const checked = event.target.checked;
    document.body.classList.toggle('dark');
    if (checked) {
        loadAnimation('../Recursos/JSON/sol.json'); // Cambia esta ruta a tu archivo JSON de la animación de sol
        btnCambiarIcono.style.color = 'yellow';
    } else {
        loadAnimation('../Recursos/JSON/luna.json'); // Cambia esta ruta a tu archivo JSON de la animación de luna
        btnCambiarIcono.style.color = 'black';
    }
});