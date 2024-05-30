<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".././CSS/headerSaludo.css">
    <title>Saludar</title>
    <?php
        include("./modelo/sesion.php");
        $nombreUsuario = $_SESSION['nombre'];
    ?>
</head>
<body>
    
    <header>

        <div class="d-flex flex-md-row align-items-center justify-content-center mb-4">
            <a href="./index.php"><img src="../Recursos/Iconos/rueda-de-fuego.png" alt="logo" id="logomarca"></a>
            <h1 class="text-center mx-md-auto">The University of Driving</h1> 
        </div>

    </header>
    
</body>
</html>