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
    @$mysqli=mysqli_connect('localhost', 'root', '2808', 'agenciaviajes');
    $error=mysqli_connect_errno();
    if($error!=null){
        echo"<p>error $error conectando a la base de datos:", mysqli_connect_error(),"</p>";
        exit();
    }
    $result=mysqli_query($mysqli, "SELECT * FROM `vuelos`");
   if ($result==false) {
       echo "la consulta no ha funcionado correctamente";
   }
   else{
    echo "<table border =2>";
    echo "<th>", "id", "</th>";
    echo "<th>", "Origen", "</th>";
    echo "<th>", "Destino", "</th>";
    echo "<th>", "Fecha", "</th>";
    echo "<th>", "Company", "</th>";
    echo "<th>", "modelo_avion", "</th>";
       while($fila=mysqli_fetch_row($result))
  
      
    { 
        echo "<tr>";

        echo "<td>";
      
        echo $fila[0];
    
        echo "</td>";
        echo "<td>";
      
        echo $fila[1];
    
        echo "</td>";

        echo "<td>";
      
        echo $fila[2];
    
        echo "</td>";

        echo "<td>";
      
        echo $fila[3];
    
        echo "</td>";

        echo "<td>";
      
        echo $fila[4];
    
        echo "</td>";

        echo "<td>";
      
        echo $fila[5];
    
        echo "</td>";
        
        
       
    }
    echo "</table>";
   }

    mysqli_close($mysqli);
    ?>
</body>
</html>