<?php
include("./conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["insertar"])) {
    
    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $anio = $_POST["anio"];
    $precio = $_POST["precio"];

    if ($nombre == "" || $marca == "" || $modelo == "" || 
    $anio == "" || $precio == "") {
        
        header("Location: ../vista/insertar_coches.php?error=Debes introducir todos los Campos");
        exit();

    } 
    else {
        
        $anio = date("Y-m-d");
        $instruccion = "insert into coches (nombre_coche, marca, modelo, anio_fabricacion, precio) 
        values ('$nombre', '$marca', '$modelo', '$anio', '$precio')";
        $consulta = mysqli_query($conexion, $instruccion) or die ("Fallo en la Consulta");

        include("../vista/coche_insertado.php");
    }
    
} 
else {   
    header("Location: ./vista/insertar_coches.php");
}

?>