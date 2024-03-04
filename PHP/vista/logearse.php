<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/logearseCSS.css">
    <title>Logearse</title>
</head>
<body>

  <section>
    <div id="caja_log">

      <form action='../modelo/comprobarLogin.php' method='post'>
        <h2>Logearse</h2>

        <div class="introduc_datos">
          <span class="iconos"><ion-icon name="person"></ion-icon></span> <!-- iconos de otra pagina web -->
          <input type='text' name='inputUsuario' id='usuario' maxlength="50">
          <label for="usuario">Usuario</label>
        </div>

        <div class="introduc_datos">
          <span class="iconos"><ion-icon name="lock-closed"></ion-icon></span> <!-- iconos de otra pagina web -->
          <input type='password' name='inputPassword' id='password' maxlength="50">
          <label for="password">Contraseña</label>
        </div>

        <button type='submit' name='enviar' value='Enviar'>Login</button>

        <div id="registrar_exit">
          <p><a href="registrarse.php">Registrarse</a></p>
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
  </section>
  
  <!-- estos scripts son para que funcione los iconos de la pagina de "ionicons" -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>