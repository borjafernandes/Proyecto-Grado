<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Coches</title>
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
            max-width: 600px;
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
        input[type="date"] {
            width: calc(100% - 22px);
        }
        input[type="submit"] {
            background-color: #2ecc71;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #27ae60;
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
        span.error-message {
            color: red;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
<?php
include("../modelo/conexion.php");
include('../modelo/sesion.php');

//inicializo el error a vacio
$error="";

//Si recibo la variable "id_coche" con el metodo GET de funciones_modificar.php es pq ha habido un error al modificar el formulario:
if(isset($_GET["id_coche"]) && isset($_GET["error"])) 
{
    $id_coche=$_GET['id_coche'];
    $error=$_GET['error'];
}

//Recibo la variable "id_coche" con el metodo POST de mostrar_coches.php:
elseif(isset($_POST['id_coche']))
{
    $id_coche=$_POST['id_coche'];
}

//Sino se recibe por ningun método:
else
{
    $id_coche="";
}

if($id_coche!="")
{
    // Realizar la consulta para obtener los datos de el coche
    $instruccion = "SELECT * FROM coches WHERE id_coche = $id_coche";
    $consulta_modificar = mysqli_query($conexion, $instruccion);

    //mysqli_fetch_assoc devuelve una única fila de resultados como una "matriz asociativa" -> "$datos_coche"
    //o NULL si no hay más filas en el conjunto de resultados.
    $datos_coche = mysqli_fetch_assoc($consulta_modificar);
    ?>

    <h1>Modificación de Coche</h1>

    <form action="../modelo/funciones_modificar.php" method="POST" enctype="multipart/form-data">

        <p><label>Nombre:</label>
            <input type="text" name="nombre" size="50" maxlength="50" value="<?php echo $datos_coche['nombre_coche']; ?>">
        </p>

        <p><label>Marca:</label>
            <input type="text" name="marca" size="50" maxlength="50" value="<?php echo $datos_coche['marca']; ?>">
        </p>

        <p><label>Modelo:</label>
            <input type="text" name="modelo" size="50" maxlength="50" value="<?php echo $datos_coche['modelo']; ?>">
        </p>

        <p><label>Año de Fabricacion:</label>
            <input type="date" name="anio_fabricacion" value="<?php echo $datos_coche['anio_fabricacion']; ?>">
        </p>

        <p><label>Precio:</label>
            <input type="number" name="precio" value="<?php echo $datos_coche['precio']; ?>">
        </p>

        <!-- Campo oculto para enviar el ID del coche -->
        <input type="hidden" name="id_coche" value="<?php echo $id_coche; ?>">

        <p><input type="submit" name="modificar" value="Guardar cambios"></p>
    </form>
    <p>(Todos los datos deben ser rellenados obligatoriamente)</p>
    <br><?php

    //Muestro el error en el caso de que se haya producido al modificar el coche
    echo"<span class='error-message''>$error</span>";
}
else
{
    echo"No se encuentra el cohe";
}?>

<p><a href='mostrar_coches.php'>Volver al Listado de Coches</a> || <a href='../Pagina-BD.php'>Volver a la Pagina Principal</a></p>

</body>
</html>