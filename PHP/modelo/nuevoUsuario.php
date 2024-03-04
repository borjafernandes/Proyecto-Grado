<?php
include("../modelo/conexion.php");

function codificar_contrasenya($contrasenya){
    return password_hash($contrasenya, PASSWORD_DEFAULT);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $usuario = $_POST["usuario"];
    $contrasenya = $_POST["contrasenya"];
    // $tipo_usuario = $_POST["tipo_usuario"];

    if (empty($usuario) || empty($contrasenya)) {
        header("Location: ../vista/registrarse.php?error=Todos los campos son obligatorios");
        exit();
    }

    // if ($tipo_usuario == "selecion") {
    //     header("Location: ../vista/registrarse.php?error=Debes seleccionar un ROL de usuario");
    //     exit();
    // }

    $verificacion_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado_verificacion = mysqli_query($conexion, $verificacion_usuario);

    if (mysqli_num_rows($resultado_verificacion) == 1) {
        header("Location: ../vista/registrarse.php?error=El nombre de usuario ya existe. Por favor, elige otro.");
        exit();
    }

    $codificar_contra = codificar_contrasenya($contrasenya);

    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $contrasenya = mysqli_real_escape_string($conexion, $contrasenya);
    // $tipo_usuario = mysqli_real_escape_string($conexion, $tipo_usuario);

    $consulta = "INSERT INTO usuarios(usuario, contrasenya) VALUES ('$usuario', '$codificar_contra')";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado == false) {
        die("Error al ejecutar la consulta: " . mysqli_error($conexion));
    }

    // echo "El usuario $usuario ha sido introducido en el sistema con la contraseña $contrasenya.";
    // echo '<br><a href="../Pagina-BD.php">Volver a la pagina de Gestion</a>';
    // echo '<br><a href="../vista/registrarse.php">Volver a la pagina Anterior</a>';
    header("Location: ../vista/logearse.php?");
    exit(); 
} 
else { 
    header("Location: ../vista/registrarse.php?error=No se ha podido introducir el nuevo usuario");
    exit();   
}
mysqli_close($conexion);
?>
