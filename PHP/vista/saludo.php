<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludar</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: 0;
        }
        body {
            font-family: Arial, sans-serif;
        }
        header {
            height: 10vh;
            background-color: #3498db;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            font-size: 20px; 
            margin-bottom: 20px;
        }
        h1 {
            font-size: 16pt; 
            font-weight: bold; 
            color: #0066CC;
            text-align: center;
        }
        img{
            width: 40px;
        }    
        .user-info {
            display: flex;
            align-items: center;
        }
        p {
            margin: 0 15px;
        }
        a {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
    <?php
        $nombreUsuario = $_SESSION['nombre'];
    ?>
</head>
<body>
    
    <header>

        <h1>Bienvenido al Gestor de Vehiculos</h1>
        <div class="user-info">
            <p>Usuario: <?php echo $nombreUsuario;?></p>
            <p>Cerrar sesion-></p>
            <a href="\DAW\ProyectoGrado\PHP\modelo\cerrarSesion.php"><img src="\DAW\ProyectoGrado\Recursos\Iconos\salir.png" alt="cerrarSesion"></a>
        </div>

    </header>
    
</body>
</html>