<?php

include('..//conexion.php');

//Abrimos la conexion a la bd mysql

$conexion = conectar();
$id = intval($_GET['id']);
$resultado = false;
//Definimos la consulta sql
if (isset($_GET['id'])) {
    var_dump($id);
    $sql = 'DELETE FROM `alumno` WHERE `alumno_id` = ?';
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $resultado = true;
}

//Ejecutamos el query en la conexion abierta
desconectar($conexion);


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="./agregar_registro_styles.css">
  <title>Eliminar Alumno</title>
</head>
<body>
  <div class="container-alumno">
    <div class="alumno">
    <h3>
    <?php
      if ($resultado) {
        echo 'Alumno eliminado';
      }
    ?>
    </h3>
    <button type="button" class="mt-3 btn btn-success"><a class="text-dark" href="alumnos.php">Regresar</a></button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>