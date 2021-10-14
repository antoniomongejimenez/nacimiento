<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nacimiento</title>
</head>
<body>
  <?php require 'auxiliar.php'; ?>
  <?php $error = [];

        $nombre = filtrar_nombre_y_apellido('nombre', $error);
        $apellidos = filtrar_nombre_y_apellido('apellidos', $error);
        $fecha_nac = filtrar_fecha('fecha_nac', $error)
        ?>

  <h1>Nacimiento</h1>
  <form action="" method="GET">
        <div>
          <label for="nombre">Nombre:</label>
          <input type="text" id="nombre" name="nombre" size="10"
                 value="<?= $nombre ?>">
        </div>
        <div>
          <label for="apellidos">Apellidos:</label>
          <input type="text" id="apellidos" name="apellidos" size="10"
                 value="<?= $apellidos ?>">
        </div>

        <div>
          <label for="fecha_nac">Fecha de nacimiento:</label>
          <input type="date" id="fecha_nac" name="fecha_nac" size="10" 
                 value="<?= $fecha_nac ?>">
        </div>
        <div>
          <button type="submit">Enviar</button>
        </div>
  </form>   

<?php
  mostrar_errores($error);

  if (isset($nombre, $apellidos, $fecha_nac) && empty($error)): ?>
    <p>La edad es: <?= calcular_edad($fecha_nac) ?></p>
  <?php endif; 


?>

</body>
</html>
