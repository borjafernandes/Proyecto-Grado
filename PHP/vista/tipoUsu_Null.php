<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Sin Rol</title>
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
            font-size: 24px;
            color: #3498db;
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
        p {
            font-size: 20px; 
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
    
<?php
    // Incluir bibliotecas de funciones
    include("../modelo/conexion.php"); 
    include('../modelo/sesion.php');
    include('saludo.php');

    // Obtener los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] === "POST" ) 
    {
        $id_usuario = $_POST["id_usuario"];
        $tipo_usuario = $_POST["tipo_usuario"];
    
        $instruccion = "UPDATE usuarios SET tipo_usuario = '$tipo_usuario' WHERE id_usuario = $id_usuario";
        // Ejecución de la actualizacion del registro
        $resultado = mysqli_query($conexion, $instruccion);

    }

    echo "<h1>Asignación de ROLES de usuario</h1>";

    $instruccion = "SELECT * FROM usuarios WHERE tipo_usuario is NULL";
    $consulta = mysqli_query($conexion, $instruccion);

    if($consulta == FALSE)
    {
        echo "Error en la ejecución de la consulta.<br />";
    }
    else
    {
        // Mostrar resultados de la consulta
        $nfilas = mysqli_num_rows($consulta);
        if ($nfilas > 0) 
        {  ?>
            <table>
                <tr>
                    <th>Usuario</th>
                    <th>Tipo Usuario</th>
                    <th>Asignar ROL</th>         
                </tr>

                <?php
                while ($resultado = mysqli_fetch_assoc($consulta)) 
                {  
                    ?>
                    <tr>
                        <td><?php echo $resultado['usuario']; ?></td> 

                        <form action="tipoUsu_Null.php" method="post">
                            <td>
                                <select name="tipo_usuario">      
                                    <option value="administrador">Administrador</option>
                                    <option value="intermediario">Intermediario</option>
                                    <option value="visitante">Visitante</option>
                                </select>
                            </td>

                            <td>
                                <input type="hidden" name="id_usuario" value="<?php echo $resultado['id_usuario']; ?>">
                                <input type="submit" value="Modificar">
                            </td>
                        </form>
                    </tr>
                    <?php
                }
            }
    } ?>
    </table>
    <p>Volver a la <a href='../Pagina-BD.php'>Página de Gestion</a></p>

</body>
</html>