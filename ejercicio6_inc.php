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
      include "ejercicio6.php";
      creaConexion();
      creaVuelo("Malaga","Belfast","2021-11-26 16:12:53","Ryanair","Boeing 747");
      modificaDestino("Marrakech", 1);
      actualizaCompany( "Iberia", 4);
      deleteFlight(17);
      getFlights();
    ?>
</body>
</html>