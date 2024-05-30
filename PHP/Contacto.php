<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/contactoCSS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!--enlace para que 
    funione todo lo de boostrap-->
    <link rel="icon" type="image/png" href="../Recursos/Iconos/rueda-de-fuego.png">
    <title>Contacto</title>
    <style>
      button {
  font-family: inherit;
  font-size: 18px;
  background: linear-gradient(to bottom, #4dc7d9 0%,#66a6ff 100%);
  color: white;
  padding: 0.8em 1.2em;
  display: flex;
  align-items: center;
  justify-content: center;
  border: none;
  border-radius: 25px;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
  transition: all 0.3s;
}

button:hover {
  transform: translateY(-3px);
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
}

button:active {
  transform: scale(0.95);
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
}

button span {
  display: block;
  margin-left: 0.4em;
  transition: all 0.3s;
}

button svg {
  width: 18px;
  height: 18px;
  fill: white;
  transition: all 0.3s;
}

button .svg-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background-color: rgba(255, 255, 255, 0.2);
  margin-right: 0.5em;
  transition: all 0.3s;
}

button:hover .svg-wrapper {
  background-color: rgba(255, 255, 255, 0.5);
}

button:hover svg {
  transform: rotate(45deg);
}


    </style>
</head>
<body>

  <div id="cabezera">
    <header>
      <nav class="navbar navbar-dark fixed-top">
        <div class="container-fluid">
          <button class="navbar-toggler" id="boton-destacado" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <img src="../Recursos/Imagenes-coches/arte4.jpg" alt="imagenEnMenu" id="imagenEnMenu">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Enlaces a esta pagina</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li><a class="dropdown-item" href="index.php" target="_parent">Pagina Principal</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Descubre Mas
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="Informacion.php" target="_parent">Informacion</a></li>
                    <li>
                        <hr class="dropdown-divider">
                      </li>
                    <li><a class="dropdown-item" href="../Cursos.html" target="_parent">Cursos</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="Estudios.php" target="_parent">Estudios</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Paginas Especiales
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                      <li><a class="dropdown-item" href="../McLaren.html" target="_blank">McLaren</a></li>
                      <li>
                          <hr class="dropdown-divider">
                        </li>
                      <li><a class="dropdown-item" href="../MotosSport.html" target="_blank">Moto Sport</a></li>
                    </ul>
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
  </div>
  
  <div id="todoElContenido">

    <form action="resultadoContacto.php" method="post" id="formulario">

      <h2>¡Contáctanos!</h2>
      <p>Por favor, rellena este formulario y nos pondremos en contacto contigo lo antes posible.</p>

      <label for="nombre">Nombre y Apellidos:</label>
      <input type="text" name="nombreApellidos" id="nombreApellidos" class="inputs" autofocus required>

      <label for="telefono">Teléfono:</label>
      <input type="tel" name="telefono" id="telefono" class="inputs" placeholder="Número de contacto">

      <label for="email">Correo Electrónico:</label>
      <input type="email" name="email" id="email" class="inputs" required>

      <label for="mensaje">Mensaje:</label>
      <textarea name="mensaje" id="mensaje" class="inputs" rows="5" required></textarea>

      <!-- <button type="submit" class="botones">Enviar Mensaje</button> -->
      <button type="submit" class="botones">
        <div class="svg-wrapper-1">
          <div class="svg-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
              <path fill="none" d="M0 0h24v24H0z"></path>
              <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
            </svg>
          </div>
        </div>
        <span>Enviar</span>
      </button>
      <button type="reset" class="botones">Restablecer</button>
      <!-- <p><a href="../JuegoJS.html">Enlace Misterioso</a></p> -->

    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- este script es de boostrap -->
</body>
</html>