<?php
include("../modelo/conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $usuario = $_POST["inputUsuario"];
    $contrasenya = $_POST["inputPassword"];
    // $tipo_usuario = $_POST["tipo_usuario"];

    // // Verificar si el tipo de usuario existe
    // $verificacion_tipo_usuario = "SELECT id FROM tipousuario WHERE id = '$tipo_usuario'";
    // $resultado_verificacion_tipo_usuario = mysqli_query($conexion, $verificacion_tipo_usuario);

    
    // Verificar si el tipo de usuario existe
    // $verificacion_tipo_usuario = "SELECT id FROM tipousuario WHERE id = '$tipo_usuario'";
    // echo "Consulta SQL: $verificacion_tipo_usuario<br>"; // Imprimir la consulta SQL para verificarla
    // $resultado_verificacion_tipo_usuario = mysqli_query($conexion, $verificacion_tipo_usuario);

    // Verificar el número de filas devueltas por la consulta
    // $num_filas = mysqli_num_rows($resultado_verificacion_tipo_usuario);
    // echo "Número de filas devueltas: $num_filas<br>";

    // if ($num_filas != 1) {
    //     header("Location: ../vista/registrarse.php?error=El tipo de usuario seleccionado no es valido");
    //     exit();
    // }
    
    // if (mysqli_num_rows($resultado_verificacion_tipo_usuario) != 1) {
    //     header("Location: ../vista/registrarse.php?error=El tipo de usuario seleccionado no es valido");
    //     exit();
    // }

    if (empty($usuario) || empty($contrasenya)) {
        header("Location: ../vista/registrarse.php?error=Todos los campos son obligatorios");
        exit();
    }

    // if ($tipo_usuario == "selecion") {
    //     header("Location: ../vista/registrarse.php?error=Debes seleccionar un ROL de usuario");
    //     exit();
    // }

    $verificacion_usuario = "SELECT * FROM usuario 
    INNER JOIN tipousuario WHERE usuario = '$usuario'";
    
    $resultado_verificacion = mysqli_query($conexion, $verificacion_usuario);

    if (mysqli_num_rows($resultado_verificacion) == 1) {
        header("Location: ../vista/registrarse.php?error=El nombre de usuario ya existe. Por favor, elige otro.");
        exit();
    }

    $codificar_contra = password_hash($contrasenya, PASSWORD_DEFAULT);
    // echo "dentro $codificar_contra tipo_usuario $tipo_usuario";

    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $contrasenya = mysqli_real_escape_string($conexion, $contrasenya);

    $consulta = "INSERT INTO usuario(usuario, contrasenya, id_tipousuario) 
             VALUES ('$usuario', '$codificar_contra', 2)";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado == false) {
        die("Error al ejecutar la consulta: " . mysqli_error($conexion));
    }

    // echo "El usuario $usuario ha sido introducido en el sistema con la contraseña $contrasenya.";
    // echo '<br><a href="../Pagina-BD.php">Volver a la pagina de Gestion</a>';
    // echo '<br><a href="../vista/registrarse.php">Volver a la pagina Anterior</a>';
    
    header("Location: ../vista/logearse.php?");
    // header("Location: ../PaginaPrincipal.php?");
    exit(); 
} 
else { 
    header("Location: ../vista/registrarse.php?error=No se ha podido introducir el nuevo usuario");
    exit();   
}
mysqli_close($conexion);
?>
