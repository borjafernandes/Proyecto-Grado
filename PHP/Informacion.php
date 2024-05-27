<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/informacionCSS.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!--enlace para que 
    funione todo lo de boostrap-->
    <link rel="icon" type="image/png" href="../Recursos/Iconos/rueda-de-fuego.png">
    <style>
      body{
        background-color: #7c7e80;
      }
    </style>
    <title>Informacion</title>
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
              <img src="../Recursos/Imagenes-coches/especialcar3.jpg" alt="imagenEnMenu" id="imagenEnMenu">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Enlaces a otras paginas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3"> 
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Sobre Nosotros
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                      <li><a class="dropdown-item" href="PaginaPrincipal.php" target="_parent">Pagina Principal</a></li>
                      <li>
                          <hr class="dropdown-divider">
                        </li>
                      <li><a class="dropdown-item" href="../Cursos.html" target="_parent">Cursos</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="Estudios.php" target="_parent">Estudios</a></li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="Drifting.php" target="_parent">¿Drifting?</a></li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="Contacto.php" target="_parent">Contacto</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Otras Opciones
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

      <h1>Informate sobre Nosotros</h1>
      <section>
          <img src="../Recursos/Imagenes-coches/exoti1.jpg" alt="imagen 1">
          <img src="../Recursos/Imagenes-coches/exoti2.jpg" alt="imagen 2">
          <img src="../Recursos/Imagenes-coches/exoti3.jpg" alt="imagen 3">
          <img src="../Recursos/Imagenes-coches/exoti4.jpg" alt="imagen 4">
      </section>

    </header>
  </div>

  <div id="contenido" class="container mt-4">
        <article id="informacion">
            <h2>Sobre que Trata este Curso</h2>
            <p>Esta es una formación <strong>TOTALMENTE PERSONALIZADA</strong>, me adaptaré a tus objetivos mientras vives la experiencia del Drift al Volante de mi BMW E36 V8 
            con 300CV totalmente preparado, aprenderás no solo a derrapar, si no a entender y CONTROLAR tu el coche. No es un curso más, te enseñaré a hablar un nuevo idioma, 
            el mismo que habla tu coche, pero esta vez va a ser más divertido que aprender inglés.</p>
            <h4>Asi es la experiencia:</h4>
            <p>Como te he dicho antes es una formación totalmente Personalizada, según tu nivel, avance y objetivos adapto el contenido para ti, para que puedas 
            generar el juicio para poder llevar el coche de lado sin preocupaciones, no obstante te dejo los temas que más suelo trabajar con los alumnos:</p>
            <ol class="listas">
                <li>¿Que es un sobreviraje?</li>
                <li>5 Técnicas de inicio del derrape (F.A.P.E.C)</li>
                <li>Gestión del volante y sus fases</li>
                <li>Las fases del derrape (S.E.R)</li>
                <li>Gestión de los pedales en el Drift</li>
                <li>La trazada (Que es, y que diferencias hay)</li>
            </ol>
            <p>En la segunda parte del curso, practicaremos mediante unos ejercicios prácticos en pista que iremos cambiando a medida que vayas progresando.</p>
            <ol class="listas">
                <li>Inicio del Drift con Clutch Kick</li>
                <li>Control del drift</li>
                <li>Control de transferencia de pesos</li>
                <li>Gestión del acelerador, freno y volante</li>
                <li>Gestión de los neumáticos</li>
                <li>Aplicación de la trazada</li>
            </ol>
            <p>El curso tiene una duración de alrededor de 1:30 horas, siendo 45/60 minutos teoría, y 30 minutos de practica en pista en tres stints de 15 min, uno con el coche 
            deslizante y dos con el bmw de drift.</p>
        </article>
    </div>
    
  <?php include("../Footer.html");?>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- este script es de boostrap -->
</body>
</html>