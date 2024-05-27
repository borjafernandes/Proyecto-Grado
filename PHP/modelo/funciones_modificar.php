<?php
include("conexion.php");
// include("sesion.php");

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modificar"])) {
    
    $nombre = $_POST['nombre'];
    $marca = $_POST['id_marca'];
    $modelo = $_POST['modelo'];
    $fecha_fabricacion = $_POST['fecha_fabricacion'];
    $precio = $_POST['precio'];
    $cv = $_POST['cv'];
    $tipocombustible = $_POST['id_combustible'];
    $distintivo = $_POST['id_distintivo'];
    $descripcion = $_POST['descripcion'];
    $id_coche = $_POST["id_coche"];

    //Compruebo si ha introducido los campos obligatorios
    if ($nombre=="" || $marca=="" || $modelo=="" || $fecha_fabricacion=="" || $precio=="" ||
        $cv=="" || $tipocombustible=="" || $distintivo=="" || $descripcion=="") {
        // Mostrar el formulario de registro incompleto
        header("Location: ../vista/modificar_coches.php?id_coche=$id_coche&error=Error al modificar el coche");
    }
    //Si se han recibido todos los campos obligatorios
    else {
        
        // Actualizar el registro en la base de datos
        $instruccion = "UPDATE coche SET nombre = '$nombre', marca = '$marca', modelo = '$modelo', 
        fecha_fabricacion = '$fecha_fabricacion', precio = '$precio', potencia = '$cv', id_combustible = '$tipocombustible',
        id_distintivo = '$distintivo', observaciones = '$descripcion' WHERE id = $id_coche";

        
        // Ejecución de la actualizacion del registro
        $resultado = mysqli_query($conexion, $instruccion);

        if ($resultado) {
            // Si se actualiza correctamente, redirecciona a una página de éxito
            header("Location: ../vista/coche_actualizado.php?nombre=$nombre&marca=$marca&modelo=$modelo&fecha_fabricacion=$fecha_fabricacion&precio=$precio&cv=$cv&tipocombustible=$tipocombustible&distintivo=$distintivo&descripcion=$descripcion");
        } else {
            // Si hay un error al actualizar, muestra un mensaje de error
            $error_msg = mysqli_error($conexion);
            header("Location: ../vista/modificar_coches.php?id_coche=$id_coche&error=$error_msg");
        }
    }
} else {
    // Si no se ha enviado el formulario, redirecciona a la página de listado de coches
    header("Location: ../vista/mostrar_coches.php");
}
?>