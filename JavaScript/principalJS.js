
const btnCambiarIcono = document.getElementById('iconoluna');
const btnCambiar = document.getElementById('btncambiarmodo');

btnCambiar.addEventListener('change', (event) => {
    const checked = event.target.checked;
    document.body.classList.toggle('dark');
    if (checked) {
        btnCambiarIcono.innerHTML = '<i class="fa-solid fa-sun"></i>';
        btnCambiarIcono.style.color = 'yellow';
    } else {
        btnCambiarIcono.innerHTML = '<i class="fa-solid fa-moon"></i>';
        btnCambiarIcono.style.color = 'black';
    }
});


