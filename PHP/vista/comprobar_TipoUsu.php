<?php

//Si no tiene ROL asignado terminamos la ejecución del programa
if($tipo_usuario!="administrador")
{
    echo"No tienes acceso";
    exit();
}
else
{
    include("modelo/conexion.php"); 

    $instruccion = "SELECT COUNT(*) AS cantidad_nulos FROM usuarios WHERE tipo_usuario IS NULL";
    $consulta = mysqli_query($conexion, $instruccion);
    
    if ($consulta) 
    {
        $fila = mysqli_fetch_assoc($consulta);
        $cantidad_nulos = $fila['cantidad_nulos'];
    
        echo "<p>Nuevos usuarios sin asignar un Rol: $cantidad_nulos</p>";
        echo "<p><a href='vista/tipoUsu_Null.php'>Asignarles Un ROL</a></p>";
    } 
    else 
    {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }

}

?>