<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/estudiosCSS.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/estudiosSubmenu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!--enlace para que 
    funione todo lo de boostrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../Recursos/Iconos/rueda-de-fuego.png">
    <title>Requerimientos Previos</title>
</head>
<body>

    <div id="caja-contenido">

        <div id="cabezera">

            <header>

                <div id="titulo-y-boton">
                    <h1 class="mt-4 mb-4">Conocimientos Necesarios</h1>
                </div>
                
                <!-- <nav>

                    <div id="barraNavegacion">
                        <nav>
        
                            <div class="contenidos" id="videos">
                                <a href="#">Seguir Explorando</a>
                                <div id="submenu">
                                    <p><a href="../Cursos.html">Cursos</a></p>
                                    <p><a href="Informacion.php">Informacion</a></p>
                                    <p><a href="index.php">Pagina Principal</a></p>
                                    <p><a href="Contacto.php">Contacto</a></p>
                                </div>
                            </div>
                            
                            <div class="contenidos" id="videos">
                                <a href="#">Te Puede Interesar</a>
                                <div id="submenu">
                                    <p><a href="../MotosSport.html" target="_blank">Motos</a></p>
                                    <p><a href="../McLaren.html" target="_blank">McLaren</a></p>
                                </div>
                            </div>

                        </nav>
                    </div>

                </nav> -->

                <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seguir Explorando</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    <a class="dropdown-item" href="../Cursos.html">Cursos</a>
                                    <a class="dropdown-item" href="Informacion.php">Informacion</a>
                                    <a class="dropdown-item" href="index.php">Pagina Principal</a>
                                    <a class="dropdown-item" href="Contacto.php">Contacto</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Te Puede Interesar</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    <a class="dropdown-item" href="../MotosSport.html" target="_blank">Motos</a>
                                    <a class="dropdown-item" href="../McLaren.html" target="_blank">McLaren</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>

        </div>
        
        <div id="contenido">

            <article id="descripcion">

                <h2>Descripcion</h2>
                <p>Un curso deportivo para controlar el derrapaje en vehículos de tracción trasera y aprender las técnicas de sobreviraje en este tipo de vehículos. 
                Mejora tu habilidad al volante y pasa un rato adrenalínico con cada viraje.</p>
        
            </article>   
            
            <article id="contenido-curso">
                <h3>Contenido del curso:</h3>
                <ul>
                    <li>Bienvenida y cumplimentación de seguros</li>
                    <li>Posición de conducción y volante: Ergonomía y seguridad</li>
                    <li>Habilidad al volante, anticipación y control del acelerador</li>
                    <li>Control del sobreviraje y contravolante en curva simple</li>
                    <li>Control del sobreviraje y contravolante en curvas enlazadas</li>
                    <li>Técnicas de sobreviraje</li>
                </ul>
                <p>
                    El centro dispone de deportivos Nissan 370Z equipados con desconectadores de sistemas. para los cursos de Drift enfocados todos los públicos y 
                    niveles mediante programas prácticos en una pista diseñada a tal efecto.
                </p>
                <p>
                    Estos cursos van dirigidos a todas aquellas personas que utilizan el coche a diario o de forma esporádica, ya sea por desplazamientos laborales 
                    in itinere o en misión con cursos a medida para empresa y cursos abiertos para particulares.
                </p>
            </article>

            <div id="titulo-y-boton">
                <button class="btn btn-primary" id="mostrarImagen">Mostrar/Esconder Imagen</button>
            </div>

            <div id="imagen">
                <img src="../Recursos/Imagenes-coches/especialcar8.jpg" alt="No funciona la imagen" id="imagencentro">
            </div>

            <article id="incluye">
                <h4>Incluye</h4>
                <ul>
                    <li>Uso pistas e instalaciones Circuito Escuela</li>
                    <li>Uso vehículos escuela (1 cada 3 personas)</li>
                    <li>Instructores profesionales</li>
                    <li>Seguro accidentes personal</li>
                    <li>Diploma asistencia</li>
                </ul>
    
                <p>Tines que tener el <strong>Carnet de conducir (B2) por mas de 2 años y tienes que tener mas de 18 años</strong> para poder por lo menos
                iniciarte en este mundillo ya que si no tienes experiencia con el coche se nos va a complicar la enseñanza.</p>
            </article>

        </div>     
       
        <?php include("../Footer.html");?>

    </div>
    
    <script src="../JavaScript/mostrarImagen.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- este script es de boostrap -->
</body>
</html>