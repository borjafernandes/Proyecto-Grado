<?php
include("conexion.php");
include("sesion.php");


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modificar"])) {
    
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio_fabricacion = $_POST['anio_fabricacion'];
    $precio = $_POST['precio'];
    $id_coche = $_POST["id_coche"];

    //Compruebo si ha introducido los dos campos obligatorios
    if ($nombre=="" || $marca=="" || $modelo=="" || $anio_fabricacion=="" || $precio=="") {
        // Mostrar el formulario de registro incompleto
        header("Location: ../vista/modificar_coches.php?id_coche=$id_coche&error=Error al modificar el coche");
    }
    //Si he recibido los dos campos obligatorios
    else{
        
        //inserto el registro en la base de datos
        $fecha = date("Y-m-d");

        $instruccion = "UPDATE coches SET nombre_coche = '$nombre', marca = '$marca', modelo='$modelo', 
        anio_fabricacion='$anio_fabricacion', precio = '$precio' WHERE id_coche = $id_coche";
        // Ejecución de la actualizacion del registro
        $resultado = mysqli_query($conexion, $instruccion);

        //Una vez insertado muestro la pagina con el resultado
        include("../vista/coche_actualizado.php");
    }

}
//Si no he recibido el POST
else {
    // Mostrar el formulario de registro "LIMPIO"
    header("Location: vista/mostrar_coches.php");
}

?>