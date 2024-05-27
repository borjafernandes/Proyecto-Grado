<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Marcas</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            text-align: center;
            margin: 20px;
        }
        h1 {
            font-size: 24px;
            color: #3498db;
            margin-top: 20px;
        }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: #fff;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        p {
            font-size: 18px;
            color: #333;
            margin-top: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <h1>Resultado de la Operación</h1>

    <?php
    include("./conexion.php");
    if (isset($_POST['eliminar'])) {
        if (isset($_POST['borrar']) && !empty($_POST['borrar'])) {
            $numfilas = count($_POST['borrar']);
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $numfilas; $i++) {
                        $idmarca = $_POST['borrar'][$i];
                        $instruccion = "SELECT * FROM marca WHERE id = $idmarca";
                        $consulta = mysqli_query($conexion, $instruccion);
                        if (!$consulta) {
                            die("Error en la consulta: " . mysqli_error($conexion));
                        }
                        $resultado = mysqli_fetch_assoc($consulta);
                        ?>
                        <tr>
                            <td><?= $resultado['nombre'] ?></td>
                        </tr>
                        <?php
                        mysqli_query($conexion, "DELETE FROM marca WHERE id = $idmarca");
                    }
                    ?>
                </tbody>
            </table>
            <?php
            echo "Marcas eliminadas: $numfilas";
        } else {
            header("Location: ../vista/eliminar_marcas.php?error=No ha seleccionado ninguna marca para eliminar");
            exit();
        }
    }
    ?>

    <p>Volver a la <a href="../Pagina-BD.php">Página de Gestion</a></p>

</body>
</html>
