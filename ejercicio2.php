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
       
       $file=fopen("locations.csv", "r+");
        $datos=[];
        $datos[0]="Caleta";
        $datos[1]="271.084823-319.222227";
       
        echo "<table border=2>";
        echo "<th>Location</th>
        <th>Latitude</th>";
      while (fgetcsv($file)==true){ 
        $array=(fgetcsv($file));
        echo "<tr>";
          echo "<td>", "$array[0]", "</td>";
          echo "<td>", "$array[1]", "</td>";
          
        echo"</tr>";
       
       
      }
      echo "</table>";
      fclose($file);
      $file = fopen("locations.csv", "a+");
      fputcsv($file,$datos);
      fclose($file);
    ?>
</body>
</html>