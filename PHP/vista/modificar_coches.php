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
        select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            appearance: none; /* Eliminar el estilo nativo del sistema operativo */
            background-color: #fff;
            background-image: url('data:image/svg+xml;utf8,<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>'); /* Icono de flecha hacia abajo */
            background-repeat: no-repeat;
            background-position: right 10px center;
            cursor: pointer;
        }
        /* Estilo cuando el menú desplegable está abierto */
        select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }
        /* Estilo para las opciones del menú desplegable */
        select option {
            background-color: #fff;
            color: #333;
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
    $instruccion = "SELECT coche.id, coche.nombre, marca.nombre AS nombre_marca, coche.modelo, coche.fecha_fabricacion, 
    coche.precio, coche.potencia, tipocombustible.descripcion AS combustible, distintivo.descripcion AS distintivo,
    coche.observaciones 
    FROM coche 
    INNER JOIN marca ON coche.marca = marca.id 
    INNER JOIN distintivo ON coche.id_distintivo = distintivo.id 
    INNER JOIN tipocombustible ON coche.id_combustible = tipocombustible.id WHERE coche.id = $id_coche";
    $consulta_modificar = mysqli_query($conexion, $instruccion);

    if (!$consulta_modificar) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }

    //mysqli_fetch_assoc devuelve una única fila de resultados como una "matriz asociativa" -> "$datos_coche"
    //o NULL si no hay más filas en el conjunto de resultados.
    $datos_coche = mysqli_fetch_assoc($consulta_modificar);
    ?>

    <h1>Modificación de Coche</h1>

    <?php
        //Muestro el error en el caso de que se haya producido al modificar el coche
        echo"<span class='error-message''>$error</span>";
    ?>

    <form action="../modelo/funciones_modificar.php" method="POST" enctype="multipart/form-data">

        <p><label>Nombre:</label>
            <input type="text" name="nombre" size="50" maxlength="50" value="<?php echo $datos_coche['nombre']; ?>">
        </p>

        <p><label>Marca:</label>
            <select name="id_marca">
                <?php
                    // Obtener todas las marcas disponibles
                    $consulta_marcas = mysqli_query($conexion, "SELECT * FROM marca");
                    while ($fila = mysqli_fetch_assoc($consulta_marcas)) {
                        // Comprueba si esta marca es la actual del coche y selecciona esta opción
                        $selected = ($fila['id'] == $datos_coche['nombre_marca']) ? 'selected' : '';
                        echo "<option value='{$fila['id']}' $selected>{$fila['nombre']}</option>";
                    }
                ?>
            </select>
        </p>

        <p><label>Modelo:</label>
            <input type="text" name="modelo" size="50" maxlength="50" value="<?php echo $datos_coche['modelo']; ?>">
        </p>

        <p><label>Año de Fabricacion:</label>
            <input type="date" name="fecha_fabricacion" value="<?php echo $datos_coche['fecha_fabricacion']; ?>">
        </p>

        <p><label>Precio:</label>
            <input type="number" name="precio" value="<?php echo $datos_coche['precio']; ?>">
        </p>

        <p><label>Potencia (CV):</label>
            <input type="number" name="cv" value="<?php echo $datos_coche['potencia']; ?>">
        </p>

        <p><label>Combustible:</label>
            <select name="id_combustible">
                <?php
                // Obtener todos los tipos de combustible disponibles
                $consulta_combustible = mysqli_query($conexion, "SELECT * FROM tipocombustible");
                while ($fila = mysqli_fetch_assoc($consulta_combustible)) {
                    // Comprueba si este tipo de combustible es el actual del coche y selecciona esta opción
                    $selected = ($fila['id'] == $datos_coche['id_combustible']) ? 'selected' : '';
                    echo "<option value='{$fila['id']}' $selected>{$fila['descripcion']}</option>";
                }
                ?>
            </select>
        </p>

        <p><label>Distintivo:</label>
            <select name="id_distintivo">
                <?php
                    // Obtener todos los distintivos disponibles
                    $consulta_distintivo = mysqli_query($conexion, "SELECT * FROM distintivo");
                    while ($fila = mysqli_fetch_assoc($consulta_distintivo)) {
                        // Comprueba si este distintivo es el actual del coche y selecciona esta opción
                        $selected = ($fila['id'] == $datos_coche['id_distintivo']) ? 'selected' : '';
                        echo "<option value='{$fila['id']}' $selected>{$fila['descripcion']}</option>";
                    }
                ?>
            </select>
        </p>

        <p><label>Descripcion:</label>
            <input type="text" name="descripcion" value="<?php echo $datos_coche['observaciones']; ?>">
        </p>

        <!-- Campo oculto para enviar el ID del coche -->
        <input type="hidden" name="id_coche" value="<?php echo $id_coche; ?>">

        <p><input type="submit" name="modificar" value="Guardar cambios"></p>
    </form>
    <p>(Todos los datos deben ser rellenados obligatoriamente)</p>
    <br><?php

}
else
{
    echo"No se encuentra el cohe";
}?>

<p><a href='mostrar_coches.php'>Volver al Listado de Coches</a> || <a href='../Pagina-BD.php'>Volver a la Pagina Principal</a></p>

</body>
</html>