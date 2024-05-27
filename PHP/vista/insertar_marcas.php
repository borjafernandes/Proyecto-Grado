<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Marcas</title>
    <link rel="icon" type="image/png" href="../../Recursos/Iconos/rueda-de-fuego.png">
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
            color: #3498db;
            margin-top: 30px;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 15px;
            font-size: 18px;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #297fb8;
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
    <?php include("../modelo/conexion.php");?>
    <h1>Inserción de Marcas</h1>
    <form action="../modelo/funciones_insert-Marcas.php" method="post">

    <?php
        // Consulta para obtener el máximo ID de marca
        $consulta_max_id = "SELECT MAX(id) AS max_id FROM marca";
        $resultado_max_id = mysqli_query($conexion, $consulta_max_id);
        $fila_max_id = mysqli_fetch_assoc($resultado_max_id);
        $ultimo_id_marca = $fila_max_id['max_id']; // Obtener el último ID
        
        echo "Último ID Introducido: $ultimo_id_marca";
    ?>    

    <label for="id">ID de la Marca:</label>
    <input type="number" name="id" size="50" maxlength="50">
    <br><br>

    <label for="nombre">Nombre de la Marca:</label>
    <input type="text" name="nombre" size="50" maxlength="50">
    <br><br>
    
    <input type="submit" name="insertar" value="Insertar Marca">
    </form>
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