<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Vehiculos</title>
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
        form {
            margin-top: 20px;
        }
        label {
            font-size: 18px;
            margin-right: 10px;
        }
        select {
            padding: 6px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            display: block;
            margin: 10px auto;
        }
        input[type="submit"]:hover {
            background-color: #297fb8;
        }
        #volver p {
            margin-top: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    
    <?php 
    include("./modelo/sesion.php");

    //Si no tiene ROL asignado terminamos la ejecución del programa
    if($tipo_usuario=="")
    {
        echo"<h1>Debe esperar a que un administrador le de acceso al sistema<h1/>";
        exit();
    }

    include("./vista/saludo.php");
    ?>

    <form action="Pagina-BD.php" method="post">
        <label for="opcion">Seleciona una opcion:</label>
        <select name="opcion" id="opcion">
            <?php
                echo '<option value="ver-coches">Ver Coches</option>';
                echo '<option value="ver-marcas">Ver Marcas</option>';

                if($tipo_usuario=="administrador"){    
                echo'<option value="insertar-coches">Insertar Coches</option>';           
                echo'<option value="eliminar-coches">Eliminar Coches</option>';
                echo '<option value="insertar-marcas">Insertar Marcas</option>';
                echo '<option value="eliminar-marcas">Eliminar Marcas</option>';
                }
            ?> 
        </select>
        <input type="submit" value="Realizar Operacion">
    </form>

    <div id="volver">
        <p>Volver a la <a href="../PaginaPrincipal.html">Pagina Principal</a></p>

        <?php

            if($tipo_usuario=="administrador")
            {
                include("vista/comprobar_TipoUsu.php");
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                $opcion = $_POST["opcion"];

                if ($opcion == "insertar-coches") {
                    header("Location: vista/insertar_coches.php");
                    exit();
                }
                else if ($opcion == "ver-coches") {
                    header("Location: vista/mostrar_coches.php");
                    exit();
                }
                else if ($opcion == "eliminar-coches") {
                    header("Location: vista/eliminar_coches.php");
                    exit();
                }
                else if ($opcion == "ver-marcas") {
                    header("Location: vista/mostrar_marcas.php");
                    exit();
                }
                else if ($opcion == "insertar-marcas") {
                    header("Location: vista/insertar_marcas.php");
                    exit();
                }
                else if ($opcion == "eliminar-marcas") {
                    header("Location: vista/eliminar_marcas.php");
                    exit();
                }
            }

        ?>
    </div>
    

</body>
</html>