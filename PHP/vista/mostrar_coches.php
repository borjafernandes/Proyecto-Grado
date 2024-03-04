<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coches</title>
    <?php
        include("../modelo/conexion.php");
        include("../modelo/fecha.php");
        include("../modelo/sesion.php");
        include("saludo.php");
    ?>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: 0;
        }
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        header {
            background-color: #3498db;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            font-size: 18px;
        }
        h1 {
            font-size: 24px; 
            font-weight: bold; 
            color: #0066CC;
            margin: 20px 0;
        }
        select {
            padding: 6px;
            font-size: 16px;
            margin-right: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            margin: 10px auto;
        }
        .user-info p{
            margin: 0 15px;
            font-size: 20px;
        }
        input[type="submit"]:hover {
            background-color: #297fb8;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: #fff;
        }
        form {
            display: inline-block;
        }
        p {
            margin: 20px 0;
            font-size: 16px;
        }
        a {
            text-decoration: none;
            color: #0066CC;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <h1>Coches en la Base de Datos</h1>

    <?php

        include("../vista/mostrar-marcas-coche.php");

        if ($idMarca != "todas") {
            $instruccion = "SELECT marca,coches.id_coche, nombre_coche, marcas.id_marca, modelo, 
            anio_fabricacion, precio, marcas.nombre_marca FROM coches INNER JOIN marcas ON coches.marca = marcas.id_marca 
            WHERE coches.marca = $idMarca ORDER BY anio_fabricacion DESC";
        } 
        else {
            $instruccion = "SELECT marca,coches.id_coche, nombre_coche, marcas.id_marca, modelo, 
            anio_fabricacion, precio, marcas.nombre_marca FROM coches INNER JOIN marcas ON coches.marca = marcas.id_marca 
            ORDER BY anio_fabricacion DESC";
        }
              
        $consulta = mysqli_query($conexion, $instruccion);

        if ($consulta == false) {
            echo "Error en la ejecucion de la consulta.";
        }
        else{

            $numfilas = mysqli_num_rows($consulta);
            if ($numfilas > 0) {
                ?>
                <table border="1">
                    <tr>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Precio</th>
                        <?php 
                        if ($tipo_usuario=="administrador") {?>
                        <th>Modificar</th><?php
                        }
                        ?>
                    </tr>
                    <?php
                    while($resultado = mysqli_fetch_assoc($consulta)){
                        ?>
                        <tr>
                            <td><?php echo $resultado['nombre_coche']?></td>
                            <td><?php echo $resultado['nombre_marca']?></td>
                            <td><?php echo $resultado['modelo']?></td>
                            <td><?php echo date2string($resultado['anio_fabricacion'])?></td>
                            <td><?php echo $resultado['precio']?></td>   
                            <?php 
                            if ($tipo_usuario=="administrador") {?>
                                <td>
                                <form action="modificar_coches.php" method="post">
                                    <input type="hidden" name="id_coche" value="<?php echo $resultado['id_coche'];?>">
                                    <input type="submit" value="Modificar">
                                </form>
                            </td><?php
                            }
                            ?> 
                        </tr><?php
                    } ?>
                </table>
                <?php
            }
            else {
                echo "No hay Coches Para Mostrar";
            }

        }
        mysqli_close($conexion);
    ?>

    <p>Volver a la <a href="../Pagina-BD.php">Pagina de Gestion</a></p>

</body>
</html>