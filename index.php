<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Hora en PHP</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <div class="container">
    <h1><strong>Bienvenido al Reloj Mundial de Miguel</strong></h1>
    <form method="POST">
      <input type="text" name="lugar" placeholder="Madrid, Tokio, México..." required>
      <button type="submit">Mostrar hora</button>
    </form>
  

  <p>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $lugar = trim($_POST["lugar"] ?? "");

        if ($lugar === "") {
          echo "Por favor, ingresa un lugar.";
          exit;
        }

        try {
            $cadena_conexion = 'mysql:dbname=relojes_mundo;host=3.95.204.198';
            $usuario = 'miguel';
            $clave = 'Miguel#28';

            $bd = new PDO($cadena_conexion, $usuario, $clave);

            $sql = "
                SELECT nombre, pais, zona_horaria
                FROM lugares
                WHERE nombre LIKE :lugar OR pais LIKE :lugar
                LIMIT 1
            ";

            $stmt = $bd->prepare($sql);
            $stmt->execute([
                ':lugar' => "%" . $lugar . "%"
            ]);

            foreach($stmt as $fila) {
              $zona = $fila["zona_horaria"];
              $fecha = new DateTime("now", new DateTimeZone($zona));
              $hora = $fecha->format("H:i:s");

              echo "Bienvenido, la hora actual en " . $fila["nombre"] . ", " . $fila["pais"] . " es: $hora";
            }
              echo "No se encontró ese lugar en la base de datos.";

        } catch (PDOException $e) {
          echo "Error de conexión a la base de datos: " . $e->getMessage();
        }
      }
    ?>
  </p>
  </div>

</body>
</html>
