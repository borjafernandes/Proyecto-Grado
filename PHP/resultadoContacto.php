<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/resultadoContacto.css">
    <link rel="icon" type="image/png" href="../Recursos/Iconos/rueda-de-fuego.png">
    <title>Resultados del Contacto</title>
</head>
<body>

<div id="resultado">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreApellidos = isset($_POST["nombreApellidos"]) ? $_POST["nombreApellidos"] : "No has introducido tu Nombre/Apellidos";
        $email = isset($_POST["email"]) ? $_POST["email"] : "No has introducido tu Email";
        // $fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
        $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "No has introducido tu Teléfono";
        $mensaje = isset($_POST["mensaje"]) ? $_POST["mensaje"] : "No hay Ningún Mensaje";

        echo "<h2>Resultados del Contacto</h2>";
        echo "<table>";
        echo "<tr><td><strong>Nombre:</strong></td><td>$nombreApellidos</td></tr>";
        // echo "<tr><td><strong>Apellidos:</strong></td><td>$apellidos</td></tr>";
        echo "<tr><td><strong>Teléfono:</strong></td><td>$telefono</td></tr>";
        echo "<tr><td><strong>Email:</strong></td><td>$email</td></tr>";
        echo "<tr><td><strong>Mensaje:</strong></td><td>$mensaje</td></tr>";
        // echo "<tr><td><strong>Fecha:</strong></td><td>";

        // if (!empty($fecha)) {
        //     $fechaFormateada = date("d-m-Y", strtotime($fecha));
        //     echo $fechaFormateada;
        // } else {
        //     echo "No especificada";
        // }

        echo "</td></tr>";
        echo "</table>";

        echo "Volver a <a href='Contacto.php'>Contacto</a> o a la <a href='index.php'>Pagina Principal</a>";
    } else {
        echo "<p>Error: No se han recibido datos del formulario.</p>";
    }
    ?>

</div>

</body>
</html>