<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link para que funcione AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> <!--Este enlace es de una pagina web para que me deje 
    utilizar los iconos que tiene esa pagina-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!--enlace para que 
    funione todo lo de boostrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Links de CSS -->
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/DarkMode.css">
    <link rel="stylesheet" href="../CSS/submenu.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/botonEstilo.css">
    <link rel="stylesheet" href="../CSS/hoverbutton.css">
    <!-- Logo -->
    <link rel="icon" type="image/png" href="../Recursos/Iconos/rueda-de-fuego.png">
    <title>The University of Driving</title>
    <?php
        include("./modelo/conexion.php");
        $instruccion = "SELECT coche.id AS coche_id, coche.nombre AS coche_nombre, coche.modelo, coche.precio, 
        concat('./img/foto', coche.id, '.jpg') AS foto, marca.nombre AS marca_nombre, tipocombustible.descripcion AS combustible_descripcion, 
        coche.potencia AS potencia, distintivo.descripcion AS distintivo_descripcion
        FROM coche 
        INNER JOIN marca ON coche.marca = marca.id
        INNER JOIN tipocombustible ON coche.id_combustible = tipocombustible.id
        INNER JOIN distintivo ON coche.id_distintivo = distintivo.id
        ORDER BY coche.id DESC LIMIT 3";

        $consulta = mysqli_query($conexion, $instruccion);

        if ($consulta === false) {
            echo "Error en la ejecución de la consulta: " . mysqli_error($conexion);
        }

    ?>
</head>
<body>

    <div data-aos="zoom-in-up">
        <div>
            <header>
                
                <div class="d-flex flex-md-row align-items-center justify-content-between" id="header">
                    <img src="../Recursos/Iconos/rueda-de-fuego.png" alt="logo" id="logomarca">
                    <h1 class="text-center">The University of Driving</h1>
                    <!-- <div>
                        <label for="btncambiarmodo" id="iconoluna"><i class="fa-solid fa-moon"></i></label>
                        <input type="checkbox" id="btncambiarmodo">
                    </div> -->
                    <div>
                        <label for="btncambiarmodo" id="iconoluna">
                            <div id="lottie-container" style="width: 100px; height: 100px;"></div>
                        </label>
                        <input type="checkbox" id="btncambiarmodo">
                    </div>
                </div>

                <!-- <div class="navbar mt-5">
                    <a href="./vista/logearse.php">Iniciar Sesión</a>
                    <a href="Contacto.php">Contacto</a>
                    <a href="../Cursos.html">Cursos</a>
                    <a href="../MotosSport.html">Motos</a>
                    <a href="Drifting.php">¿Que es el Drifting?</a>
                </div> -->

                <section id="sectionNavbar">
                    <div class="menu-toggle"></div>
                    <nav>
                        <a href="Drifting.php">¿Drifting?</a>
                        <a href="../Cursos.html">Cursos</a>
                        <a href="../MotosSport.html">Motos</a>
                        <a href="Contacto.php">Contacto</a>
                        <a href="./vista/registrarse.php">Registrarse</a>
                        <div class="animation start-home"></div>
                    </nav>
                    <div class="clearfix"></div>
                </section>
                
                <div class="d-flex justify-content-center align-items-center">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade m-0">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../Recursos/Imagenes-coches/arte3(mclaren_720).jpg" alt="IMGcarousel1" class="w-100 d-block carousel">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>McLaren 720</h5> 
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../Recursos/Imagenes-coches/carousel1.jpg" alt="IMGcarousel2" class="w-100 d-block carousel">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>AUDI R8</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../Recursos/Imagenes-coches/carousel2.jpg" alt="IMGcarousel3" class="w-100 d-block carousel">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Lamborghni Huracan GT3</h5>    
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../Recursos/Imagenes-coches/carousel3.jpg" alt="IMGcarousel4" class="w-100 d-block carousel">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Pagani Huayra</h5> 
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../Recursos/Imagenes-coches/carousel4.jpg" alt="IMGcarousel5" class="w-100 d-block carousel">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>McLaren P1 GTR</h5> 
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="../Recursos/Imagenes-coches/arte2(ferrari_488_gtb).jpg" alt="IMGcarousel6" class="w-100 d-block carousel">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Ferrari 488 GTB</h5> 
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </header>
        </div>
    </div>
    
    <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <div>
            <div id="contenidosecundario">
                <h3>Ultimas Noticias</h3>
                <article id="articulo2">
                    <div id="box-imagenPrueba">
                        <img src="../Recursos/Imagenes-coches/futurista.jpg" alt="imagencochevista" id="imagencochevista">
                    </div> 
                    <div id="textoInfo">
                        <p>
                            ¡Atención entusiastas de los motores! Prepárense para la llegada de una verdadera 
                            obra maestra sobre ruedas: el nuevo Hypercar VX-7000. Con su lanzamiento programado 
                            para un futuro cercano, este automóvil redefine los límites de la velocidad, la tecnología 
                            y el diseño. Equipado con un sistema de propulsión híbrido de última generación, el VX-7000 
                            ofrece una combinación impresionante de potencia y eficiencia. Su motor eléctrico, alimentado 
                            por una batería de vanguardia, trabaja en armonía con un motor de combustión interna de alto 
                            rendimiento, brindando una aceleración sin igual y una experiencia de conducción emocionante.
                            Pero el rendimiento no es lo único que define al Hypercar VX-7000.
                        </p>  
                        <p>A continuación le muetsro el enlace a la página web donde lo podrá ver en un futuro.</p>    
                        <br> 
                        <a href="../McLaren.html">
                            <button class="button" data-text="Awesome">
                                <span class="actual-text">&nbsp;McLaren&nbsp;</span>
                                <span aria-hidden="true" class="hover-text">&nbsp;McLaren&nbsp;</span>
                            </button>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <div data-aos="zoom-in">
        <div class="d-flex justify-content-center mt-5">
            <div class="text-center justify-content-center">
                <div class="text-center justify-content-center d-flex" id="accesbd">
                    <h3 class="mb-4 me-3">Buscador Avanzado - Registro Previo</h3>
                    <a href="BuscadorCoches.php" class="ov-btn-grow-skew-reverse mb-4" id="link-coche">
                        <div id="lottie-car"></div>
                        <div class="text-overlay" id="text-overlay">Buscador</div>
                    </a>
                </div>

                <h3 class="mb-4 me-3">Ultimas Novedades</h3>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 mb-5 g-4 justify-content-center" id="coches-container">
                    <?php
                    // Iterar sobre los resultados de la consulta y mostrarlos en tarjetas Bootstrap
                    while ($resultado = mysqli_fetch_assoc($consulta)) {
                    ?>
                    <div class="col mt-2">
                        <div class="col mt-5">
                            <div class="card h-100 w-100 ml-5">
                                <img src="<?php echo $resultado['foto']; ?>" class="card-img-top" alt="imagen">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Nombre: <?php echo $resultado['coche_nombre']; ?></h5>
                                    <p class="card-text">Marca: <?php echo $resultado['marca_nombre']; ?></p>
                                    <p class="card-text">Modelo: <?php echo $resultado['modelo']; ?></p>
                                    <p class="card-text">Precio: <?php echo number_format($resultado['precio'], 0, '', '.'); ?>€</p>
                                    <p class="card-text">Potencia: <?php echo $resultado['potencia']; ?> CV</p>
                                    <p class="card-text">Combustible: <?php echo $resultado['combustible_descripcion']; ?></p>
                                    <p class="card-text">Distintivo Ambiental: <?php echo $resultado['distintivo_descripcion']; ?></p>
                                    <a href="./vista/mostrarcoche.php?id_coche=<?php echo $resultado['coche_id']; ?>">Más Información</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php include("../Footer.html");?>

    <!-- funcionmiento del json -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.5/lottie.min.js"></script>
    <!-- <script src="../JavaScript/LunaSol.js"></script> -->
    <script src="../JavaScript/navbar.js"></script>
    <script src="../JavaScript/darklight.js"></script>
    <script src="../JavaScript/coche.js"></script>
    <!-- este script es de boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- scripts para que funcione AOS-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script> AOS.init();</script>
</body>
</html>