<?php
include('..//conexion.php');

// Obtenemos la información del alumno
$nombres = $_POST['nombres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];

// Abrimos la conexión a la base de datos
$conexion = conectar();
// Formamos la consulta SQL
$sql = "INSERT INTO alumno(nombres, ape_paterno, ape_materno) VALUES ('$nombres', '$ape_paterno', '$ape_materno')";

// Ejecutamos la instrucción SQL

$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
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
  <title>Agregar Alumno</title>
</head>
<body>
  <div class="container-alumno">
    <div class="alumno">
    <h3>
    <?php
      if (!$resultado) {
        echo 'No se ha podido registrar al alumno';
      }
      else {
        echo 'Alumno registrado';
      }
    ?>
    </h3>
    <button type="button" class="mt-3 btn btn-success"><a class="text-dark" href="alumnos.php">Regresar</a></button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>