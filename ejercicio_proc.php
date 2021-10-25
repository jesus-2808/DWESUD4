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
@$mysqli=mysqli_connect('localhost', 'root', '2808', 'agenciaviajes');  //en casa root, 2808
    $error=mysqli_connect_errno();
    if($error!=null){
        echo"<p>error $error conectando a la base de datos:", mysqli_connect_error(),"</p>";
        exit();
    }

    $id=13;
   $origen="Granada";
  
   $sql= "UPDATE vuelos SET Origen=? WHERE id=?";
   $consulta=mysqli_stmt_init($mysqli);
   if($stmt=mysqli_prepare($mysqli, $sql)){
       mysqli_stmt_bind_param($stmt, "si", $origen, $id);
       mysqli_stmt_execute($stmt);
      
       mysqli_stmt_close($stmt);
   }

   mysqli_close($mysqli);
   ?>
</body>
</html>