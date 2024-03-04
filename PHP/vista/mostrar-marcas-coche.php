<?php

if (isset($_GET['id_marca'])) {
    $idMarca = $_GET['id_marca'];
} 
else {
    $idMarca = "todas";
}

echo "<form action='mostrar_coches.php' method='get'>";

$consulta = "SELECT id_marca, nombre_marca FROM marcas";
$resultado = mysqli_query($conexion, $consulta);

echo "<select name='id_marca'>";
echo "<option value='todas'>Todas</option>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    
    echo "<option value='$fila[id_marca]'";
    if ($fila['id_marca'] == $idMarca) echo " selected";
    echo ">$fila[nombre_marca]</option>";

}
echo "</select>";
echo "<input type='submit' value='Filtrar' name='filtrar' />";
?>
</form>
