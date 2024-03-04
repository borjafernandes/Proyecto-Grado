<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/registrarseCSS.css">
    <title>Registro de Usuario</title>
</head>
<body>

    <div id="caja_registro">

      <form action="../modelo/nuevoUsuario.php" method="post">
        <h2>Registrarse</h2>

        <div class="introduc_datos">
          <span class="iconos"><ion-icon name="person"></ion-icon></span> <!-- iconos de otra pagina web -->
          <input type="text" name="usuario" placeholder="Usuario" required>
        </div>

        <div class="introduc_datos">
          <span class="iconos"><ion-icon name="lock-closed"></ion-icon></span> <!-- iconos de otra pagina web -->
          <input type="password" name="contrasenya" placeholder="Contraseña" required>
        </div>

        <!-- <div id="introduc_datos_tipoUsu">
            <select name="tipo_usuario" required>
                <option value="selecion">Tipo de Usuario</option>
                <option value="administrador">Administrador</option>
                <option value="intermediario">Intermediario</option>
                <option value="visitante">Visitante</option>
            </select>
        </div> -->

        <button type="submit" value="Registrar" name='enviar'>Registrarse</button>

        <div id="registrar_exit">
          <p><a href="logearse.php">Ya tengo Cuenta</a></p>
          <p><a href="../../PaginaPrincipal.html">Pagina Principal</a></p>
        </div>

        <?php
          // Verificar si hay un mensaje de error
          if (isset($_GET['error'])) 
          {
            echo '<p id="mensaje_error">' . $_GET['error'] . '</p>';
          }
        ?>

      </form>

    </div>

    <!-- estos scripts son para que funcione los iconos de la pagina de "ionicons" -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>


