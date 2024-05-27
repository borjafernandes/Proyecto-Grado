<?php
include("./conexion.php");
include("./fecha.php");

if (isset($_POST['eliminar'])) {
    
    if (isset($_POST['borrar']) && !empty($_POST['borrar'])) {
        
        $numfilas = count($_POST['borrar']);

        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Coches Eliminados</title>
            <style>
                *{
                    margin: 0;
                    padding: 0;
                    box-sizing: 0;
                }
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f4f4f4;
                    text-align: center;
                }
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f2f2f2;
                    text-align: center;
                    margin: 20px;
                }
                h2 {
                    font-size: 24px;
                    color: #e74c3c;
                    margin-top: 20px;
                }
                table {
                    width: 80%;
                    margin: 20px auto;
                    border-collapse: collapse;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                th, td {
                    padding: 15px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }
                th {
                    background-color: #c0392b;
                    color: #fff;
                }
                a{
                    text-decoration: none;
                    color: blue;
                }
                a:hover{
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>

        <h2>Coche(s) Eliminado(s)</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año de Fabricación</th>
                <th>Precio</th>
            </tr>
        <?php

        for ($i = 0; $i < $numfilas; $i++) { 
            
            $idCoche = $_POST['borrar'][$i];
            $instruccion = "SELECT coche.nombre, marca.nombre AS nombre_marca, coche.modelo, coche.fecha_fabricacion, coche.precio AS precio FROM coche 
            INNER JOIN marca ON coche.marca = marca.id 
            WHERE coche.id = $idCoche";
            $consulta = mysqli_query($conexion, $instruccion);
            
            if (!$consulta) {
                die("Error en la consulta: " . mysqli_error($conexion));
            }
            
            $resultado = mysqli_fetch_assoc($consulta);
            ?>
            <tr>
                <td><?= $resultado['nombre']?></td>
                <td><?= $resultado['nombre_marca']?></td>
                <td><?= $resultado['modelo']?></td>
                <td><?= date2string($resultado['fecha_fabricacion'])?></td>
                <td><?= $resultado['precio']?> $</td>
            </tr>
            <?php
            mysqli_query($conexion, "DELETE FROM coche WHERE id = $idCoche");
        }
        ?>
        </table>
        <p>Total de Coches Eliminados: <?= $numfilas ?></p>
        <p><a href="../vista/eliminar_coches.php">Volver</a></p>
        </body>
        </html>
        <?php
    } 
    else {
        header("Location: ../vista/eliminar_coches.php?error=No ha seleccionado ningún coche para eliminar");
        exit();
    }
}
?>
