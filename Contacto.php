<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./CSS/contactoCSS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!--enlace para que 
    funione todo lo de boostrap-->
    <title>Contacto</title>
</head>
<body>

  <div id="cabezera">
      <header>
          <h1>Contacta Con Nosotros</h1>
          <nav class="navbar navbar-dark fixed-top">
              <div class="container-fluid">
                <button class="navbar-toggler" id="boton-destacado" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                  <img src="./Recursos/Imagenes-coches/drif4.jpg" alt="imagenEnMenu" id="imagenEnMenu">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Enlaces a esta pagina</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                      <li><a class="dropdown-item" href="PaginaPrincipal.html" target="_parent">Pagina Principal</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Descubre Mas
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li><a class="dropdown-item" href="Informacion.html" target="_parent">Informacion</a></li>
                          <li>
                              <hr class="dropdown-divider">
                            </li>
                          <li><a class="dropdown-item" href="Horario.html" target="_parent">Horario</a></li>
                          <li>
                            <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="Estudios.html" target="_parent">Estudios</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Paginas Especiales
                          </a>
                          <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#" target="_blank">Seleccion de Vehiculos</a></li>
                            <li>
                                <hr class="dropdown-divider">
                              </li>
                            <li><a class="dropdown-item" href="MotosSport.html" target="_blank">Moto Sport</a></li>
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

    <form action="./PHP/resultadoContacto.php" method="post" id="formulario">

      <h4>Rellenar Estos Campos</h4>
      <input type="text" name="nombre"  class="inputs" autofocus placeholder="Introduce tu Nombre">
      <input type="text" name="apellidos" class="inputs" required placeholder="Introduce tus Apellidos">
      <input type="email" name="email" class="inputs" placeholder="Introduce tu Correo">
      <input type="date" name="fecha" class="inputs">
      
      <button type="submit" class="botones" value="enviar">Enviar</button>
      <button type="reset" class="botones" value="restablecer">Restablecer</button>
      <p><a href="JuegoJS.html">Enlace Misterioso</a></p>
    </form>

  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- este script es de boostrap -->
</body>
</html>