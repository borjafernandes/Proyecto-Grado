<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coche Actualizado</title>
    <?php
        // Obtener las variables necesarias de la URL
        $nombre = $_GET['nombre'];
        $marca = $_GET['marca'];
        $modelo = $_GET['modelo'];
        $fecha_fabricacion = $_GET['fecha_fabricacion'];
        $precio = $_GET['precio'];
        $cv = $_GET['cv'];
        $tipocombustible = $_GET['tipocombustible'];
        $distintivo = $_GET['distintivo'];
        $descripcion = $_GET['descripcion'];
    ?>
    
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
        h2 {
            font-size: 24px;
            color: #2ecc71;
            margin-top: 20px;
        }
        p {
            font-size: 18px;
            color: #333;
            margin-top: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            border: 2px solid #3498db;
            border-radius: 10px;
            padding: 15px;
            display: inline-block;
        }
        li {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
        }
        a {
            color: #3498db;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #2980b9;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h2>Resultado de la actualización de el Coche</h2>
    <p>El Coche ha sido actualizada correctamente:</p>
    <ul>
        <li>Nombre: <?=$nombre?></li>
        <li>Marca: <?=$marca?></li>
        <li>Modelo: <?=$modelo?></li>
        <li>Fecha de Fabricación: <?=date ("d-m-Y")?></li>
        <li>Precio: <?=$precio?></li>
        <li>Potencia: <?=$cv?> CV</li>
        <li>Combustible: <?=$tipocombustible?></li>
        <li>Distintivo: <?=$distintivo?></li>
        <li>Descripción: <?=$descripcion?></li>
    </ul>
    <br>
    <p><a href='../vista/mostrar_coches.php'>Volver a la Pagina Anterior</a></p>

</body>
</html>