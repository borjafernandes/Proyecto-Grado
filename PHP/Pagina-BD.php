<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../Recursos/Iconos/rueda-de-fuego.png">
    <title>Gestión de Vehículos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        form {
            margin-top: 50px;
        }
        p{
            margin-bottom: 20px;
            color: #333;
            font-size: 20px;
        }
        label {
            font-size: 20px;
            margin-right: 10px;
            color: #333;
        }
        select {
            padding: 10px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            outline: none;
        }
        input[type="submit"] {
            padding: 12px 24px;
            font-size: 18px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #297fb8;
        }
        #volver p {
            margin-top: 30px;
            font-size: 18px;
        }
        #volver p a {
            color: #3498db;
            text-decoration: none;
        }
        #volver p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <?php
    // include("./modelo/sesion.php");

    //Simulando un tipo de usuario para pruebas
    // $tipo_usuario = "administrador"; // Puedes cambiar esto para simular diferentes tipos de usuario

    include("./vista/saludo.php");
    ?>

    <form action="Pagina-BD.php" method="post">
        <p class="mb-4">Bienvenido <?php echo $nombreUsuario;?> al panel de control de la BD.</p>
        <label for="opcion">Selecciona una opción:</label>
        <select name="opcion" id="opcion">
            <?php
                echo '<option value="ver-coches">Ver Coches</option>';
                echo '<option value="ver-marcas">Ver Marcas</option>';

                if ($tipo_usuario == "1") {
                    echo '<option value="insertar-coches">Insertar Coches</option>';
                    // echo '<option value="eliminar-coches">Eliminar Coches</option>';
                    echo '<option value="insertar-marcas">Insertar Marcas</option>';
                    echo '<option value="eliminar-marcas">Eliminar Marcas</option>';
                }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Realizar Operación">
    </form>

    <div id="volver">
        <!-- <p>Ir a la <a href="#" onclick="goBack();">Página Anterior</a></p> -->
        <p>Volver a la <a href="BuscadorCoches.php">Página Anterior</a></p>
        <p><a href=".\modelo\cerrarSesion.php">Cerrar Sesión</a></p>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $opcion = $_POST["opcion"];

        if ($opcion == "insertar-coches") {
            header("Location: vista/insertar_coches.php");
            exit();
        } else if ($opcion == "ver-coches") {
            header("Location: vista/mostrar_coches.php");
            exit();
        } else if ($opcion == "eliminar-coches") {
            header("Location: vista/eliminar_coches.php");
            exit();
        } else if ($opcion == "ver-marcas") {
            header("Location: vista/mostrar_marcas.php");
            exit();
        } else if ($opcion == "insertar-marcas") {
            header("Location: vista/insertar_marcas.php");
            exit();
        } else if ($opcion == "eliminar-marcas") {
            header("Location: vista/eliminar_marcas.php");
            exit();
        }
    }
    ?>

    <!-- Este Script es para que vuelva a la Pagina Anterior y que no se necesite poner el enlace a esa Pagina -->
    <script src=".././JavaScript/paginaAnterior.js"></script>
</body>
</html>