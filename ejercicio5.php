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

    $result=mysqli_query($mysqli, "INSERT INTO `vuelos` (Origen, Destino, Fecha, Company, Modelo_avion) VALUES ('Almería', 'Melilla', '2021-10-31 18:10:00', 'Vueling', 'A380')");
    $result2= mysqli_query($mysqli, "DELETE FROM `vuelos` WHERE id='2'");
    $result3=mysqli_query($mysqli, "UPDATE `vuelos` SET `Origen`='Ceuta', `Company`='Vueling' WHERE `id`='15'");
   if ($result==false) {
       echo "la consulta no ha funcionado correctamente";
   }else{
        echo "Se han insertado", mysqli_affected_rows($mysqli), " filas";
        echo "<br>";
        echo "el id del ultimo elemento añadido es ", mysqli_insert_id($mysqli);
   }

   if ($result2==false) {
    echo "la consulta no ha funcionado correctamente";
    }else{
     echo "Se han borrado", mysqli_affected_rows($mysqli), " filas";
     echo "<br>";
    
    }

    if ($result3==false) {
        echo "la consulta no ha funcionado correctamente";
    }else{
         echo "Se han actualizado", mysqli_affected_rows($mysqli), " filas";
         echo "<br>";
        
    }



   mysqli_close($mysqli);
   ?>
</body>
</html>