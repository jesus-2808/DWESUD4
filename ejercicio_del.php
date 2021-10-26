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

    $result=mysqli_query($mysqli, "DELETE FROM `vuelos` WHERE Origen='Malaga'");
 

   if ($result==false) {
       echo "la consulta no ha funcionado correctamente";
   }else{
        echo "Se ha borrado ", mysqli_affected_rows($mysqli), " filas";
   }

   mysqli_close($mysqli);
   ?>