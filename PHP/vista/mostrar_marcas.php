<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas</title>
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
        .user-info p{
            margin: 0 15px;
            font-size: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #3498db;
            color: #fff;
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
    
    <h1>Marcas de Coches en la Base de Datos</h1>

    <?php
        $instruccion = "SELECT * FROM marcas";
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
                    </tr>
                    <?php
                    while($resultado = mysqli_fetch_assoc($consulta)){
                        ?>
                        <tr>
                            <td><?php echo $resultado['nombre_marca']?></td>
                        </tr><?php
                    } ?>
                </table>
                <?php
            }
            else {
                echo "No hay Marcas Para Mostrar";
            }

        }
        mysqli_close($conexion);
    ?>

    <p>Volver a la <a href="../Pagina-BD.php">Pagina de Gestion</a></p>



</body>
</html>