<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca tu Coche Ideal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> <!--enlace para que funcione todo lo de boostrap-->
    <link rel="icon" type="image/png" href="../Recursos/Iconos/rueda-de-fuego.png">
    <!-- Links de CSS -->
    <link rel="stylesheet" href="../CSS/iconosBarraNavegacion.css">
    <link rel="stylesheet" href="../CSS/botonCerrarSesion.css">
    <link rel="stylesheet" href="../CSS/BuscadorCochesCSS.css">
    <link rel="stylesheet" href="../CSS/scrollBar.css">
    <?php
        include("./modelo/conexion.php");
        include("./modelo/sesion.php");
        include("./vista/saludo.php");
    ?>
</head>
<body>

    <?php
        $instruccion = "SELECT coche.id AS coche_id, coche.nombre AS coche_nombre, concat('./img/foto', coche.id, '.jpg') AS foto, 
        coche.modelo, coche.precio, 
        marca.nombre AS marca_nombre, tipocombustible.descripcion AS combustible_descripcion, 
        coche.potencia AS potencia, distintivo.descripcion AS distintivo_descripcion
        FROM coche 
        INNER JOIN marca ON coche.marca = marca.id
        INNER JOIN tipocombustible ON coche.id_combustible = tipocombustible.id
        INNER JOIN distintivo ON coche.id_distintivo = distintivo.id
        ORDER BY coche.nombre ASC";

        $consulta = mysqli_query($conexion, $instruccion);

        if ($consulta === false) {
            echo "Error en la ejecución de la consulta: " . mysqli_error($conexion);
        }

    ?>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav pb-3 px-auto">
                    <li style="--i:#a955ff;--j:#ea51ff;">
                        <a href="./PaginaPrincipal.php">
                            <span class="icon">🏠</span>
                            <span class="title">Página Principal</span>
                        </a>
                    </li>
                    <li style="--i:#ff1493;--j:#1e90ff;">
                        <a href="Contacto.php">
                            <span class="icon">✉️</span>
                            <span class="title">Contacto</span>
                        </a>
                    </li>
                    <li style="--i:#ffd700;--j:#ff8c00;">
                        <a href="../Cursos.html">
                            <span class="icon">📚</span>
                            <span class="title">Cursos</span>
                        </a>
                    </li>
                    <li style="--i:#0077b6;--j:#00b4d8;">
                        <a href="../MotosSport.html">
                            <span class="icon">🏍️</span>
                            <span class="title">Motos</span>
                        </a>
                    </li>
                    <li style="--i:#2d6a4f;--j:#95d5b2;">
                        <a href="./Drifting.php">
                            <span class="icon">🏎️</span>
                            <span class="title">Drifting</span>
                        </a>
                    </li>
                    <?php if ($tipo_usuario == 1): ?>
                        <li style="--i:#ff8c42;--j:#ff3c83;">
                        <a href="Pagina-BD.php">
                            <span class="icon">⚙️</span>
                            <span class="title">Administrar BD</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <a class="nav-link" href=".\modelo\cerrarSesion.php">
                        <button class="Btn">
                            <div class="sign">
                                <svg viewBox="0 0 512 512">
                                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                                </svg>
                            </div>
                            <div class="text">Cerrar Sesión</div>
                        </button>
                    </a>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <p class="mb-4">Bienvenido <?php echo $nombreUsuario;?>, ¿qué coche quieres buscar?</p>

        <div class="row mb-4">
            <div class="col-md-3">
                <input type="text" id="searchNombre" class="form-control" placeholder="Buscar por nombre...">
            </div>
            <div class="col-md-3">
                <input type="text" id="searchMarca" class="form-control" placeholder="Buscar por marca...">
            </div>
            <div class="col-md-3">
                <div class="d-flex align-items-center flex-column">
                    <label for="searchPrecioRange" id="precioValue">0€</label>
                    <input type="range" id="searchPrecioRange" class="form-range" min="0" max="30000" step="1000" value="0" oninput="updatePrecioInput(this.value)">
                    <input type="hidden" id="searchPrecio" value="30000">
                </div>
            </div>
        </div>

        <div id="searchResults" class="row row-cols-1 row-cols-md-3 g-4"></div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 mb-5 g-4" id="originalResults">
        <?php
        // Iterar sobre los resultados de la consulta y mostrarlos en tarjetas Bootstrap
        while ($resultado = mysqli_fetch_assoc($consulta)) {
        ?>
            <div class="col mt-5">
                <div class="col mt-5">
                    <div class="card h-100 w-100 ml-5">
                        <img src="<?php echo $resultado['foto']; ?>" class="card-img-top" alt="imagen">
                        <div class="card-body">
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- este script es de boostrap -->
    <script src="../JavaScript/buscadorCoche.js"></script>
</body>
</html>
