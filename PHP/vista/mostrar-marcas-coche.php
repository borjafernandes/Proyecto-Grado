<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar por Marcas</title>
    <style>
        /* Estilos para el contenedor del formulario */
        .form-container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        /* Estilos para el título */
        .form-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        /* Estilos para el formulario */
        .form {
            display: flex;
            align-items: center;
        }
        /* Estilos para el select */
        .form-select {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 10px;
            appearance: none; /* Eliminar el estilo nativo del sistema operativo */
        }
        /* Estilos para el botón */
        .form-submit {
            background-color: #2ecc71;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        /* Estilos para el botón al pasar el cursor */
        .form-submit:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
<div class="form-container">
    <div class="form-title">Buscar por Marcas</div>
    <form class="form" action="mostrar_coches.php" method="get">
        <select class="form-select" name="id_marca">
            <?php
            include("../modelo/conexion.php");

            if (isset($_GET['id_marca'])) {
                $idMarca = $_GET['id_marca'];
            } else {
                $idMarca = "todas";
            }

            $consulta = "SELECT id, nombre FROM marca";
            $resultado = mysqli_query($conexion, $consulta);

            echo "<option value='todas'>Todas</option>";

            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<option value='{$fila['id']}'";
                if ($fila['id'] == $idMarca) echo " selected";
                echo ">{$fila['nombre']}</option>";
            }

            ?>
        </select>
        <input class="form-submit" type="submit" value="Filtrar" name="filtrar" />
    </form>
</div>
</body>
</html>