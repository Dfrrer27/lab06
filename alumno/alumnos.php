<?php

include('..//conexion.php');

//Abrimos la conexion a la bd mysql

$conexion = conectar();

//Definimos la consulta sql

$sql = 'SELECT alumno_id, nombres, ape_paterno, ape_materno FROM alumno';

//Ejecutamos el query en la conexion abierta

$resultado = mysqli_query($conexion, $sql);

//Cerramos la conexion

desconectar($conexion);

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="./alumnos_styles.css">
  <title>Alumnos</title>
</head>
<body>
  <div class="container">
    <div class="content-table">
      <h1>Alumnos</h1>

      <div>
        <button type="button" class="mt-3 btn btn-success"><a class="text-dark" href="agregar.html">Nuevo Alumno</a></button>
        <table class="mt-3 table table-dark table-striped table-bordered border border-danger">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOMBRES</th>
              <th>APELLIDO PATERNO</th>
              <th>APELLIDO MATERNO</th>
              <th>EDITAR</th>
              <th>ELIMINAR</th>
            </tr>
          </thead> <!--cabecera -->
          <tbody class="table-light table-striped table-bordered border border-danger">
            <?php
              //Recorrer el array con el resultado de la consulta
              while($alumno = mysqli_fetch_array($resultado)) {
                $alumno_id = $alumno['alumno_id'];
                $nombres = $alumno['nombres'];
                $ape_paterno = $alumno['ape_paterno'];
                $ape_materno = $alumno['ape_materno'];

                echo '<tr>';
                echo '<td>' . $alumno_id . '</td>';
                echo '<td>' . $nombres . '</td>';
                echo '<td>' . $ape_paterno . '</td>';
                echo '<td>' . $ape_materno . '</td>';
                echo '<td><button type="button" class="btn btn-warning"><a class="text-dark" href="editar_alumno.php"><img src="..//img/editar.png" alt="editar"></a></button></td>'; 
                echo '<td><button type="button" class="btn btn-danger"><a class="text-light" href="eliminar_alumno.php?id=' . $alumno_id . '"><img src="..//img/basura.png" alt="eliminar"></a></button></td>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div> <!--table-->
    </div>
    
  </div> <!-- /.container -->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>