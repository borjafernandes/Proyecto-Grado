<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Coches</title>
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
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
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
        }
        input[type="submit"]:hover {
            background-color: #297fb8;
        }
        p {
            margin-top: 10px;
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
    <h1>Insercion de Coches</h1>

    <form action="../modelo/funciones_insert.php" method="post">

    <label for="nombre">Nombre del Coche:</label>
    <input type="text" name="nombre" size="50" maxlength="50">
    <br><br>
    <label for="marca">Marca del Coche:</label>
    <input type="text" name="marca" size="50" maxlength="50">
    <br><br>
    <label for="modelo">Modelo del Coche:</label>
    <input type="text" name="modelo" size="50" maxlength="50">
    <br><br>
    <label for="anio">Año de Fabricacion:</label>
    <input type="date" name="anio">
    <br><br>
    <label for="precio">Precio del Coche:</label>
    <input type="number" name="precio">
    <br><br>
    <input type="submit" name="insertar" value="Insertar Coche">
    </form>
    <p>(Todos los campos son OBLIGATORIOS)</p>
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