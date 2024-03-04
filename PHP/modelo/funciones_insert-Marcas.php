<?php
include("./conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["insertar"])) {
    
    $nombre = $_POST["nombre"];

    if ($nombre == "") {
        
        header("Location: ../vista/insertar_marcas.php?error=No ha seleccionado ningun coche para Eliminar");
        exit();

    } 
    else {
        
        $instruccion = "insert into marcas (nombre_marca) values ('$nombre')";
        $consulta = mysqli_query($conexion, $instruccion) or die ("Fallo en la Consulta");

        include("../vista/marca_insertada.php");
    }
    
} 
else {   
    header("Location: ./vista/insertar_marcas.php");
}

?>