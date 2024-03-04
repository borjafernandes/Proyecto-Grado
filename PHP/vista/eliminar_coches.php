<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Coches</title>
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
        h1 {
            font-size: 36px;
            color: #e74c3c;
            margin-top: 30px;
        }
        form {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            margin-top: 20px;
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
        input[type="checkbox"] {
            margin-left: 30px;
        }
        input[type="submit"] {
            background-color: #e74c3c;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #c0392b;
        }
        p {
            margin-top: 20px;
            font-size: 16px;
            color: #666;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
        include("../modelo/conexion.php");
        include("../modelo/fecha.php");
    ?>
    
    <h1>Eliminar Coches</h1>

    <?php
        $instruccion = "SELECT id_coche,nombre_coche,marca,modelo,anio_fabricacion,precio 
        FROM coches INNER JOIN marcas WHERE coches.marca = marcas.id_marca";
        $consulta = mysqli_query($conexion, $instruccion);

        if ($consulta == false) {
            echo "Error en la ejecucion de la consulta.";
        }
        else{

            $numfilas = mysqli_num_rows($consulta);
            if ($numfilas > 0) {
                ?>
                <form action="../modelo/funciones_delete.php" method="post">
                <table border="1">
                    <tr>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Precio</th>
                        <th>Borrar</th>
                    </tr>
                    <?php
                    while($resultado = mysqli_fetch_assoc($consulta)){
                        ?>
                        <tr>
                            <td><?php echo $resultado['nombre_coche']?></td>
                            <td><?php echo $resultado['marca']?></td>
                            <td><?php echo $resultado['modelo']?></td>
                            <td><?php echo date2string($resultado['anio_fabricacion'])?></td>
                            <td><?php echo $resultado['precio']?></td>
                            <td><input type="checkbox" name="borrar[]" value="<?= $resultado['id_coche']?>"></td>
                        </tr><?php
                    } ?>
                </table>
                <br>
                    <input type="submit" name="eliminar" value="Eliminar Coches">
                </form>
                <?php
            }
            else {
                echo "No hay Coches Para Mostrar";
            }

        }
        mysqli_close($conexion);
    ?>

    <p>Volver a la <a href="../Pagina-BD.php">Pagina de Gestion</a></p>

    <?php
    // Verificar si hay un mensaje de error
    if (isset($_GET['error'])) 
    {
        echo '<p class="error-message">' . $_GET['error'] . '</p>';
    }
    ?>

</body>
</html>