<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Coche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../Recursos/Iconos/rueda-de-fuego.png">
    <link rel="stylesheet" href="../../CSS/botonPDF.css">
    <link rel="stylesheet" href="../../CSS/mostrarcoche.css">
    <?php
        include("../modelo/conexion.php");
    ?>
</head>
<body>
    
    <?php
        if (isset($_GET['id_coche'])) {
            $id_coche = $_GET['id_coche'];
            $instruccion = "SELECT coche.id AS id_coche, coche.nombre AS nombre_coche, coche.modelo, 
            concat('../img/foto', coche.id, '.jpg') AS foto, 
            coche.precio, marca.nombre AS nombre_marca, tipocombustible.descripcion AS combustible, 
            coche.potencia, distintivo.descripcion AS distintivo
            FROM coche 
            INNER JOIN marca ON coche.marca = marca.id
            INNER JOIN tipocombustible ON coche.id_combustible = tipocombustible.id
            INNER JOIN distintivo ON coche.id_distintivo = distintivo.id
            WHERE coche.id = $id_coche";

            $consulta = mysqli_query($conexion, $instruccion);

            if ($consulta === false) {
                echo "Error en la ejecución de la consulta: " . mysqli_error($conexion);
            }

            $resultado = mysqli_fetch_assoc($consulta);
    ?>
        <div class="card-container">
            <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <img src="<?php echo $resultado['foto']; ?>" class="card-img-top" alt="imagen coche">
                <div class="card-body">
                    <h3 id="nombrecoche" class="card-title text-center mb-4"><?php echo $resultado['nombre_coche']; ?></h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Marca:</strong> <?php echo $resultado['nombre_marca']; ?></li>
                        <li class="list-group-item"><strong>Modelo:</strong> <?php echo $resultado['modelo']; ?></li>
                        <li class="list-group-item"><strong>Precio:</strong> <?php echo number_format($resultado['precio'], 0, '', '.'); ?>€</li>
                        <li class="list-group-item"><strong>Combustible:</strong> <?php echo $resultado['combustible']; ?></li>
                        <li class="list-group-item"><strong>Potencia:</strong> <?php echo $resultado['potencia']; ?> CV</li>
                        <li class="list-group-item"><strong>Distintivo Ambiental:</strong> <?php echo $resultado['distintivo']; ?></li>
                    </ul>
                    <div class="button-container">
                        <a href="../../fpdf/cochePDF.php?id_coche=<?php echo $id_coche; ?>" target="_blank">
                            <button class="button">
                                <span class="button_lg">
                                    <span class="button_sl"></span>
                                    <span class="button_text">Descargar PDF</span>
                                </span>
                            </button>
                        </a>
                    </div>
                    <button id="back" onclick="goBack();">
                        <span>Volver</span>
                    </button>
                </div>
            </div>
        </div>
    <?php
        } else {
            echo "<div class='alert alert-danger' role='alert'>No se ha proporcionado un ID de coche válido.</div>";
        }
    ?>

    <script src="../../JavaScript/paginaAnterior.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
