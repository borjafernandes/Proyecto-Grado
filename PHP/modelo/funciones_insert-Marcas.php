<?php
include("./conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["insertar"])) {
    
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];

    if ($nombre == "") {
        
        header("Location: ../vista/insertar_marcas.php?error=Tienes que rellenar TODOS los Campos");
        exit();

    } 
    else {
        
        $instruccion = "insert into marca (id, nombre) values ('$id', '$nombre')";
        $consulta = mysqli_query($conexion, $instruccion) or die ("Fallo en la Consulta");

        include("../vista/marca_insertada.php");
    }
    
} 
else {   
    header("Location: ./vista/insertar_marcas.php");
}

?>