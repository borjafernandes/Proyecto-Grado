function colorRand() {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);

    const color = `#${r.toString(16)}${g.toString(16)}${b.toString(16)}`
    return color;
}

function cambiarColor(enlace) {
    const nuevoColor = colorRand();
    enlace.style.color = nuevoColor;
}

