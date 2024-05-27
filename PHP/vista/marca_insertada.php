<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marca Insertada</title>
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
  
    <h2>Resultado de la inserccion</h2>
    <p>La Marca se ha añadido Correctamente</p>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
        <tr>
            <td><?= $id?></td>
            <td><?= $nombre?></td>
        </tr>
    </table>
    <br><br>
    <p>Volver a la <a href="../Pagina-BD.php">Pagina de Gestion</a></p>

</body>
</html>