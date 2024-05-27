<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion del Coche</title>
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

// Comprobación si se ha recibido un ID de coche
if(isset($_POST["id_coche"])) {
    $id_coche = $_POST['id_coche'];

    // Consulta para obtener los datos del coche
    $instruccion = "SELECT coche.id, coche.nombre, marca.nombre AS nombre_marca, coche.modelo, coche.fecha_fabricacion, 
    coche.precio, coche.potencia, tipocombustible.descripcion AS combustible, distintivo.descripcion AS distintivo,
    coche.observaciones 
    FROM coche 
    INNER JOIN marca ON coche.marca = marca.id 
    INNER JOIN distintivo ON coche.id_distintivo = distintivo.id 
    INNER JOIN tipocombustible ON coche.id_combustible = tipocombustible.id WHERE coche.id = $id_coche";
    
    $consulta = mysqli_query($conexion, $instruccion);

    if (!$consulta) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }

    // Comprobar si se encontró el coche
    if (mysqli_num_rows($consulta) > 0) {
        // Obtener los datos del coche
        $datos_coche = mysqli_fetch_assoc($consulta);
?>
    <h1>Información del Coche</h1>

    <form>
        <p><label>Nombre:</label>
            <input type="text" value="<?php echo $datos_coche['nombre']; ?>" readonly>
        </p>
        <p><label>Marca:</label>
            <input type="text" value="<?php echo $datos_coche['nombre_marca']; ?>" readonly>
        </p>
        <p><label>Modelo:</label>
            <input type="text" value="<?php echo $datos_coche['modelo']; ?>" readonly>
        </p>
        <p><label>Año de Fabricacion:</label>
            <input type="text" value="<?php echo $datos_coche['fecha_fabricacion']; ?>" readonly>
        </p>
        <p><label>Precio:</label>
            <input type="text" value="<?php echo $datos_coche['precio']; ?>" readonly>
        </p>
        <p><label>Potencia (CV):</label>
            <input type="text" value="<?php echo $datos_coche['potencia']; ?>" readonly>
        </p>
        <p><label>Combustible:</label>
            <input type="text" value="<?php echo $datos_coche['combustible']; ?>" readonly>
        </p>
        <p><label>Distintivo:</label>
            <input type="text" value="<?php echo $datos_coche['distintivo']; ?>" readonly>
        </p>
        <p><label>Descripcion:</label>
            <input type="text" value="<?php echo $datos_coche['observaciones']; ?>" readonly>
        </p>
    </form>

    <?php
    } else {
        echo "<p>No se encontró el coche.</p>";
    }

    mysqli_close($conexion);

} else {
    // No se recibió un ID de coche
    echo "<p>No se proporcionó un ID de coche válido.</p>";
}
?>

<p><a href='mostrar_coches.php'>Volver al Listado de Coches</a> || <a href='../Pagina-BD.php'>Volver a la Pagina Principal</a></p>

</body>
</html>