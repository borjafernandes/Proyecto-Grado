<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coche Insertado</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            margin: 20px;
        }
        h2 {
            font-size: 24px;
            color: #2ecc71;
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
            background-color: #27ae60;
            color: #fff;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        a {
            font-size: 18px;
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>Resultado de la inserción</h2>
    <p>El vehículo se ha añadido correctamente.</p>
    <br><br>
    <table>
        <tr>
            <th>Atributo</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><?= $nombre ?></td>
        </tr>
        <!-- <tr>
            <td>Marca</td>
            <td><?= $marca ?></td>
        </tr> -->
        <tr>
            <td>Modelo</td>
            <td><?= $modelo ?></td>
        </tr>
        <tr>
            <td>Año de fabricación</td>
            <td><?= $anio ?></td>
        </tr>
        <tr>
            <td>Precio</td>
            <td><?= $precio ?>$</td>
        </tr>
        <tr>
            <td>Potencia (CV)</td>
            <td><?= $potencia ?></td>
        </tr>
        <!-- <tr>
            <td>Tipo de Combustible</td>
            <td><?= $id_combustible ?></td>
        </tr> -->
        <tr>
            <td>Matrícula</td>
            <td><?= $matricula ?></td>
        </tr>
        <tr>
            <td>Observaciones</td>
            <td><?= $observaciones ?></td>
        </tr>
        <!-- <tr>
            <td>Distintivo</td>
            <td><?= $id_distintivo ?></td>
        </tr> -->
    </table>
    <br><br>
    <p>Volver a la <a href="../Pagina-BD.php">Página de Gestión</a></p>

</body>
</html>