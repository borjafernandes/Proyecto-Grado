<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coches</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../CSS/botonDelete.css">
    <link rel="icon" type="image/png" href="../../Recursos/Iconos/rueda-de-fuego.png">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Coches en la Base de Datos</h1>
    <?php
        include("../modelo/conexion.php");
        include("../modelo/fecha.php");
        include("../modelo/sesion.php");

        $instruccion = "SELECT coche.id, coche.nombre, marca.nombre AS nombre_marca, coche.modelo, coche.fecha_fabricacion, coche.precio, coche.potencia, tipocombustible.descripcion AS combustible, distintivo.descripcion AS distintivo FROM coche 
            INNER JOIN marca ON coche.marca = marca.id 
            INNER JOIN distintivo ON coche.id_distintivo = distintivo.id 
            INNER JOIN tipocombustible ON coche.id_combustible = tipocombustible.id";

        include("../vista/mostrar-marcas-coche.php");
        
        if ($idMarca != "todas") {
            $instruccion .= " WHERE coche.marca = $idMarca";
        }

        $instruccion .= " ORDER BY coche.nombre ASC";

        $consulta = mysqli_query($conexion, $instruccion);

        if (!$consulta) {
            echo "<div class='alert alert-danger' role='alert'>Error en la ejecución de la consulta: " . mysqli_error($conexion) . "</div>";
        } else {
            $numfilas = mysqli_num_rows($consulta);
            if ($numfilas > 0) {
    ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Potencia</th>
                    <th>Combustible</th>
                    <th>Distintivo</th>
                    <?php if ($tipo_usuario == "1") {?>
                    <th>Acciones</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($resultado = mysqli_fetch_assoc($consulta)){
                ?>
                <tr>
                    <td><?php echo $resultado['nombre']?></td>
                    <td><?php echo $resultado['nombre_marca']?></td>
                    <td><?php echo $resultado['modelo']?></td>
                    <td><?php echo date2string($resultado['fecha_fabricacion'])?></td>
                    <td><?php echo $resultado['precio']?> $</td>
                    <td><?php echo $resultado['potencia']?> CV</td>
                    <td><?php echo $resultado['combustible']?></td>
                    <td><?php echo $resultado['distintivo']?></td>
                    <td class="d-flex">
                        <form action="mostrarInfoCoche.php" method="post" class="mr-2">
                            <input type="hidden" name="id_coche" value="<?php echo $resultado['id'];?>">
                            <button type="submit" class="btn btn-primary btn-sm" title="Ver" data-toggle="tooltip"><i class="material-icons">visibility</i></button>
                        </form>
                        <form action="modificar_coches.php" method="post" class="mr-2">
                            <input type="hidden" name="id_coche" value="<?php echo $resultado['id'];?>">
                            <button type="submit" class="btn btn-warning btn-sm" title="Editar" data-toggle="tooltip"><i class="material-icons">edit</i></button>
                        </form>
                        <form action="eliminar_coches.php" method="post">
                            <input type="hidden" name="id_coche" value="<?php echo $resultado['id'];?>">
                            <!-- <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" data-toggle="tooltip"><i class="material-icons">delete</i></button> -->
                            <button class="button" type="submit" title="Eliminar">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 69 14"
                                    class="svgIcon bin-top"
                                >
                                    <g clip-path="url(#clip0_35_24)">
                                    <path
                                        fill="black"
                                        d="M20.8232 2.62734L19.9948 4.21304C19.8224 4.54309 19.4808 4.75 19.1085 4.75H4.92857C2.20246 4.75 0 6.87266 0 9.5C0 12.1273 2.20246 14.25 4.92857 14.25H64.0714C66.7975 14.25 69 12.1273 69 9.5C69 6.87266 66.7975 4.75 64.0714 4.75H49.8915C49.5192 4.75 49.1776 4.54309 49.0052 4.21305L48.1768 2.62734C47.3451 1.00938 45.6355 0 43.7719 0H25.2281C23.3645 0 21.6549 1.00938 20.8232 2.62734ZM64.0023 20.0648C64.0397 19.4882 63.5822 19 63.0044 19H5.99556C5.4178 19 4.96025 19.4882 4.99766 20.0648L8.19375 69.3203C8.44018 73.0758 11.6746 76 15.5712 76H53.4288C57.3254 76 60.5598 73.0758 60.8062 69.3203L64.0023 20.0648Z"
                                    ></path>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_24">
                                        <rect fill="white" height="14" width="69"></rect>
                                    </clipPath>
                                    </defs>
                                </svg>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 69 57"
                                    class="svgIcon bin-bottom"
                                >
                                    <g clip-path="url(#clip0_35_22)">
                                    <path
                                        fill="black"
                                        d="M20.8232 -16.3727L19.9948 -14.787C19.8224 -14.4569 19.4808 -14.25 19.1085 -14.25H4.92857C2.20246 -14.25 0 -12.1273 0 -9.5C0 -6.8727 2.20246 -4.75 4.92857 -4.75H64.0714C66.7975 -4.75 69 -6.8727 69 -9.5C69 -12.1273 66.7975 -14.25 64.0714 -14.25H49.8915C49.5192 -14.25 49.1776 -14.4569 49.0052 -14.787L48.1768 -16.3727C47.3451 -17.9906 45.6355 -19 43.7719 -19H25.2281C23.3645 -19 21.6549 -17.9906 20.8232 -16.3727ZM64.0023 1.0648C64.0397 0.4882 63.5822 0 63.0044 0H5.99556C5.4178 0 4.96025 0.4882 4.99766 1.0648L8.19375 50.3203C8.44018 54.0758 11.6746 57 15.5712 57H53.4288C57.3254 57 60.5598 54.0758 60.8062 50.3203L64.0023 1.0648Z"
                                    ></path>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_35_22">
                                        <rect fill="white" height="57" width="69"></rect>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php
            } else {
                echo "<div class='alert alert-warning' role='alert'>No hay Coches Para Mostrar</div>";
            }
        }
        mysqli_close($conexion);
    ?>
    <p><a href="../Pagina-BD.php" class="btn btn-primary">Volver a la Pagina de Gestion</a></p>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>