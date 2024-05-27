<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="../Recursos/Iconos/rueda-de-fuego.png">
  <title>Pagar Curso</title>
  <link rel="stylesheet" href="../CSS/pagarCurso.css">
</head>
<body>

  <main class="wrapper">
        <div class="card">
            <div class="card-front">
                <img src="../Recursos/design/bg-card-front.png" alt="Frente de la tarjeta">
                <div class="card-front__data">
                <img src="../Recursos/design/card-logo.svg" alt="">
                <div>
                    <p class="card-number" id="card-number">0000 0000 0000 0000</p>
                    <div class="card-name-date">
                    <p class="card-name" id="card-name">Nombre Y Apellidos</p>
                    <p class="card-date">
                        <span id="card-month">00</span>/<span id="card-year">00</span>
                    </p>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-back">
                <img src="../Recursos/design/bg-card-back.png" alt="Dorso de la tarjeta">
                <div class="card-back__data">
                <p class="card-cvc" id="card-cvc">000</p>
                </div>
            </div>
        </div>

        <div class="form-wrapper">
            <form class="form" id="form">
                <div class="form-group">
                <label for="input-name" class="label">Nombre del representante</label>
                <input type="text" class="input" id="input-name" placeholder="Ramon Sanchez" required>
                </div>
                <div class="form-group">
                <label for="input-number" class="label">Número de Tarjeta</label>
                <input type="text" class="input" id="input-number" placeholder="1234 5678 9123 0000" required>
                </div>
                <div class="form-group double">
                <div class="rows">
                    <label for="input-month" class="label">Caduca Fin (MM/YY)</label>
                    <div class="columns">
                    <input type="text" class="input" id="input-month" placeholder="MM" maxlength="2" required>
                    <input type="text" class="input" id="input-year" placeholder="YY" maxlength="2" required>
                    </div>
                </div>
                <div class="rows">
                    <label for="input-cvc" class="label">CVC</label>
                    <input type="text" class="input" id="input-cvc" placeholder="123" maxlength="3" required>
                </div>
                </div>
                <div class="form-group">
                    <button class="button" type="submit">
                        Confirmar Y Pagar
                        <svg class="svgIcon" viewBox="0 0 576 512"><path d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"></path></svg>
                    </button>
                </div>
            </form>
        
            <div class="thank-you disabled" id="thank-you">
                <img src="../Recursos/design/icon-complete.svg" alt="Ícono de completado">
                <p class="thank-you-title">Gracias!</p>
                <p class="thank-you-text">El pago se ha realizado con Éxito</p>
                <button class="button" id="volverAtras">Volver</button>
            </div>
        </div>
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.0.2/cleave.min.js" integrity="sha512-SvgzybymTn9KvnNGu0HxXiGoNeOi0TTK7viiG0EGn2Qbeu/NFi3JdWrJs2JHiGA1Lph+dxiDv5F9gDlcgBzjfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../JavaScript/pagarCurso.js"></script>
</body>
</html>