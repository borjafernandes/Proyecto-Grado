<?php
include("./conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["insertar"])) {
    
    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $anio = $_POST["anio"];
    $precio = $_POST["precio"];
    $potencia = $_POST["potencia"];
    $id_combustible = $_POST["id_combustible"];
    $matricula = $_POST["matricula"];
    $observaciones = $_POST["observaciones"];
    $id_distintivo = $_POST["id_distintivo"];

    if ($nombre == "" || $marca == "" || $modelo == "" || $anio == "" || $precio == "" || 
        $potencia == "" || $id_combustible == "" || $matricula == "" || $id_distintivo == "") {
        
        header("Location: ../vista/insertar_coches.php?error=Debes introducir todos los campos");
        exit();

    } 
    else {
        $fecha_actual = date("Y-m-d");
        $instruccion = "INSERT INTO coche (nombre, marca, modelo, fecha_fabricacion, precio, potencia, id_combustible, matricula, observaciones, id_distintivo) 
                        VALUES ('$nombre', '$marca', '$modelo', '$anio', '$precio', '$potencia', '$id_combustible', '$matricula', '$observaciones', '$id_distintivo')";
        $consulta = mysqli_query($conexion, $instruccion) or die("Fallo en la Consulta");

        include("../vista/coche_insertado.php");
    }
    
} 
else {   
    header("Location: ../vista/insertar_coches.php");
}

?>