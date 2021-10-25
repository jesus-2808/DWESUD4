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
@$mysqli=mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');  //en casa root, 2808
    $error=mysqli_connect_errno();
    if($error!=null){
        echo"<p>error $error conectando a la base de datos:", mysqli_connect_error(),"</p>";
        exit();
    }

  
   $origen="Bilbao";
   $id=14;
   $sql= "SELECT * FROM `vuelos` WHERE `Origen`=? and `id`=?";
   $consulta=mysqli_stmt_init($mysqli);
   if($stmt=mysqli_prepare($mysqli, $sql)){
       mysqli_stmt_bind_param($stmt, "si", $origen, $id);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_bind_result($stmt,$id,$origen, $destino, $fecha, $company, $modelo);
       while(mysqli_stmt_fetch($stmt)){
        echo "El vuelo con origen $origen y destino $destino tiene fecha prevista $fecha y es operado por $company con el modelo $modelo";
       }
       mysqli_stmt_close($stmt);
   }

   mysqli_close($mysqli);
   ?>
</body>
</html>