<?php
// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) 
{
    $inputUsuario = $_POST['inputUsuario'];
    $inputPassword = $_POST['inputPassword'];

    // validamos que recibimos ambos parámetros
    if (empty($inputUsuario) || empty($inputPassword)) 
    {
        // Redireccionar a la página de login con un mensaje de error
        header("Location: ../vista/logearse.php?error=Debes introducir un usuario y contraseña");
        exit();
    } 
    else 
    {       
        include('conexion.php');
    
        // Escapar los datos del usuario
        $usuario = mysqli_real_escape_string($conexion, $inputUsuario);
        $inputPassword = mysqli_real_escape_string($conexion, $inputPassword);

        // Consultar la base de datos para obtener el hash de la contraseña asociada al usuario
        $sql = "SELECT usuario.usuario, usuario.contrasenya, usuario.id_tipousuario FROM usuario
        INNER JOIN tipousuario ON usuario.id_tipousuario = tipousuario.id WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conexion, $sql);

        // Verificar si hubo algún error al ejecutar la consulta
        if ($resultado === false) 
        {
            die("Error al ejecutar la consulta: " . mysqli_error($conexion));
        }

        // Obtener el hash de la contraseña almacenado en la base de datos
        if ($row = mysqli_fetch_assoc($resultado)) 
        {
            $hashed_password_db = $row['contrasenya'];
            
            // Verificar la contraseña ingresada con el hash almacenado
            if (password_verify($inputPassword, $hashed_password_db)) 
            {
                //Acceso concedido -> La contraseña es correcta               
                $nombre = $row['usuario'];
                $tipo_usuario = $row['id_tipousuario'];

                // almacenamos el usuario en la sesión
                session_start();
                $_SESSION['nombre'] = $nombre;
                $_SESSION['id_tipousuario'] = $tipo_usuario;

                // Redireccionar a la página de login con un mensaje de error
                header("Location: ../BuscadorCoches.php");
                exit();
            } 
            else 
            {
                // Redireccionar a la página de login con un mensaje de error
                header("Location: ../vista/logearse.php?error=Acceso denegado, la contraseña es incorrecta");
                exit(); 
            }
        } 
        else  // El usuario no existe en la base de datos
        {
            // Redireccionar a la página de login con un mensaje de error
            header("Location: ../vista/logearse.php?error=Usuario no encontrado");
            exit();         
        }
        
        // Cerrar la conexión
        mysqli_close($conexion);
    }
}
?>