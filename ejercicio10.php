<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
  $servidor = "localhost";
  $baseDatos = "agenciaviajes";
  $usuario = "developer";
  $pass = "developer";
  try{
      $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
      echo "Conectado correctamente";
      echo "<br>";
      $conexion->beginTransaction();
      $falloConsultas=false;
 
      $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('David','Rodriguez','Martinez','Dos Hermanas','658954954')";
      $turistas=$conexion->exec(($sql));
      $last_id = $conexion->lastInsertId();
      if ($last_id<1) {
          $falloConsultas=true;
      }else{
          echo "Se han añadido $turistas cliente nuevo con el id: $last_id.";
          echo "<br>";
 
      }
 
      if ($falloConsultas=false) {
        $conexion->commit();
          echo "Cambio desecho";
      } else{
        $conexion->rollBack();
       
          echo "Cambio confirmado";
      }
  } catch(PDOException $e){
      echo"Connection fallida: " . $e->getMessage();
  }
  $conexion=null;
    ?>    
</body>
</html>
  
    ?>
</body>
</html>