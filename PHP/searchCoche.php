<?php
    include("./modelo/conexion.php");

    $nombre = mysqli_real_escape_string($conexion, $_GET['nombre']);
    $marca = mysqli_real_escape_string($conexion, $_GET['marca']);
    $precio = mysqli_real_escape_string($conexion, $_GET['precio']);

    $instruccion = "SELECT coche.id AS coche_id, coche.nombre AS coche_nombre, coche.modelo, 
    concat('./img/foto', coche.id, '.jpg') AS foto, 
    coche.precio, marca.nombre AS marca_nombre, tipocombustible.descripcion AS combustible_descripcion, 
    coche.potencia, distintivo.descripcion AS distintivo_descripcion
    FROM coche 
    INNER JOIN marca ON coche.marca = marca.id
    INNER JOIN tipocombustible ON coche.id_combustible = tipocombustible.id
    INNER JOIN distintivo ON coche.id_distintivo = distintivo.id
    WHERE coche.nombre LIKE '%$nombre%' AND marca.nombre LIKE '%$marca%'";

    if (is_numeric($precio) && $precio != '') {
        $instruccion .= " AND coche.precio <= $precio";
    }

    $instruccion .= " ORDER BY coche.nombre ASC";

    $consulta = mysqli_query($conexion, $instruccion);

    if ($consulta === false) {
        echo "Error en la ejecución de la consulta: " . mysqli_error($conexion);
    }

    $output = '';
    while ($resultado = mysqli_fetch_assoc($consulta)) {
        $output .= '<div class="col mt-5">';
        $output .= '<div class="col mt-5">';
        $output .= '<div class="card h-100 w-100 ml-5">';
        $output .= '<img src="' . $resultado['foto'] .'" class="card-img-top" alt="imagen">';
        $output .= '<div class="card-body">';
        $output .= '<h5 class="card-title">Nombre: ' . $resultado['coche_nombre'] . '</h5>';
        $output .= '<p class="card-text">Marca: ' . $resultado['marca_nombre'] . '</p>';
        $output .= '<p class="card-text">Modelo: ' . $resultado['modelo'] . '</p>';
        $output .= '<p class="card-text">Precio: ' . number_format($resultado['precio'], 0, '', '.') . '€</p>';
        $output .= '<p class="card-text">Potencia: ' . $resultado['potencia'] . ' CV</p>';
        $output .= '<p class="card-text">Combustible: ' . $resultado['combustible_descripcion'] . '</p>';
        $output .= '<p class="card-text">Distintivo Ambiental: ' . $resultado['distintivo_descripcion'] . '</p>';
        $output .= '<a href="./vista/mostrarcoche.php?id_coche=' . $resultado['coche_id'] . '">Más Información</a>';
        $output .= '</div></div></div></div>';
    }

    echo $output;
?>