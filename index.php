<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Hora en PHP</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <div class="container">
    <h1><strong>Bienvenido  a la página web de Miguel Ángel</strong></h1>
    <form method="POST">
      <input type="text" name="nombre" placeholder="Escribe tu nombre">
      <button type="submit">Mostrar hora</button>
    </form>
  </div>

  <p>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = trim($_POST["nombre"] ?? "");

        if ($nombre === "") {
          echo "Por favor, ingresa tu nombre.";
        } else {
          date_default_timezone_set("Europe/Madrid"); 
          $hora = date("H:i:s");

          echo "Hola $nombre, la hora actual en tu ubicación es: $hora";
        }
      }
    ?>
  </p>

</body>
</html>
