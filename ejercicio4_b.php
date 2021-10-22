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
   
    @$mysqli=mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');
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
    echo "<th>", "Id", "</th>";
    echo "<th>", "Origen", "</th>";
    echo "<th>", "Destino", "</th>";
    echo "<th>", "Company", "</th>";
    echo "<th>", "modelo_avion", "</th>";
    
       while($fila=mysqli_fetch_object($result)) 
    { 
      
        echo "<tr>";
        echo "<td>";
      
        echo $fila->id;
    
        echo "</td>";

        echo "<td>";
      
        echo $fila->Origen;
    
        echo "</td>";

        echo "<td>";
      
        echo $fila->Destino;
    
        echo "</td>";

        echo "<td>";
      
        echo $fila->Company;
    
        echo "</td>";

        echo "<td>";
      
        echo $fila->Modelo_avion;
    
        echo "</td>";
        
        
       
    }

   }

    mysqli_close($mysqli);
    ?>
</body>
</html>