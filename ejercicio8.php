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
    $servidor="localhost";
    $baseDatos="agenciaviajes";
    $usuario="developer";
    $pass="developer";

    try {
       $conn=new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
       echo "Conectado correctamente";
       echo "<br>";
       $sql="SELECT * FROM turista";
       $turistas=$conn->query ($sql);
       $turistas2=$conn->query ($sql);
       $turistas3=$conn->query ($sql);
       $turistas4=$conn->query ($sql);
       $turistas5=$conn->query ($sql);
       $turistas6=$conn->query ($sql);

       echo "<table border =2>";
       echo "<h3> array asociativo </h3>";
       echo "<th>", "id", "</th>";
       echo "<th>", "nombre", "</th>";
       echo "<th>", "apellido1", "</th>";
       echo "<th>", "apellido2", "</th>";
       echo "<th>", "direccion", "</th>";
       echo "<th>", "telefono", "</th>";
       
      
       while($turista =$turistas->fetch(PDO::FETCH_ASSOC)){
           echo "El turista de nombre ".$turista['nombre']." ".$turista['apellido1']." ".$turista['apellido2']." es de ".$turista['direccion']. "y su telf " .$turista['telefono']."<br/>";
           echo "<tr>";

           echo "<td>";
         
           echo $turista['id'];
       
           echo "</td>";

           echo "<td>";
         
           echo $turista['nombre'];
       
           echo "</td>";
           echo "<td>";
         
           echo $turista['apellido1'];
       
           echo "</td>";
   
           echo "<td>";
         
           echo $turista['apellido2'];
       
           echo "</td>";
   
           echo "<td>";
         
           echo $turista['direccion'];
       
           echo "</td>";
   
           echo "<td>";
         
           echo $turista['telefono'];
       
           echo "</td>";
   
          
           echo "</tr>";

          
          
       }
       echo "</table>";
       echo "<br>";

       echo "<table border =2>";
       echo "<h3> array combinado </h3>";
       echo "<th>", "id", "</th>";
       echo "<th>", "nombre", "</th>";
       echo "<th>", "apellido1", "</th>";
       echo "<th>", "apellido2", "</th>";
       echo "<th>", "direccion", "</th>";
       echo "<th>", "telefono", "</th>";

       while($turista =$turistas2->fetch(PDO::FETCH_BOTH)){
        echo "El turista de nombre ".$turista['nombre']." ".$turista['apellido1']." ".$turista['apellido2']." es de ".$turista['direccion']. "y su telf " .$turista['telefono']."<br/>";
        echo "<tr>";

        echo "<td>";
      
        echo $turista['id'];
    
        echo "</td>";

        echo "<td>";
      
        echo $turista['nombre'];
    
        echo "</td>";
        echo "<td>";
      
        echo $turista['apellido1'];
    
        echo "</td>";

        echo "<td>";
      
        echo $turista['apellido2'];
    
        echo "</td>";

        echo "<td>";
      
        echo $turista['direccion'];
    
        echo "</td>";

        echo "<td>";
      
        echo $turista['telefono'];
    
        echo "</td>";

       
        echo "</tr>";
       
    }
    echo "</table>";
    echo "<br>";

    echo "<table border =2>";
    echo "<h3> array numerico </h3>";
    echo "<th>", "id", "</th>";
    echo "<th>", "nombre", "</th>";
    echo "<th>", "apellido1", "</th>";
    echo "<th>", "apellido2", "</th>";
    echo "<th>", "direccion", "</th>";
    echo "<th>", "telefono", "</th>";

    while($turista =$turistas3->fetch(PDO::FETCH_NUM)){
   
     echo "<tr>";

     echo "<td>";
   
     echo $turista[0];
 
     echo "</td>";

     echo "<td>";
   
     echo $turista[1];
 
     echo "</td>";
     echo "<td>";
   
     echo $turista[2];
 
     echo "</td>";

     echo "<td>";
   
     echo $turista[3];
 
     echo "</td>";

     echo "<td>";
   
     echo $turista[4];
 
     echo "</td>";

     echo "<td>";
   
     echo $turista[5];
 
     echo "</td>";

    
     echo "</tr>";
    
 }
 echo "</table>";
 echo "<br>";

    echo "<table border =2>";
    echo "<h3> array objetos </h3>";
    echo "<th>", "id", "</th>";
    echo "<th>", "nombre", "</th>";
    echo "<th>", "apellido1", "</th>";
    echo "<th>", "apellido2", "</th>";
    echo "<th>", "direccion", "</th>";
    echo "<th>", "telefono", "</th>";

    while($turista =$turistas4->fetch(PDO::FETCH_OBJ)){
   
     echo "<tr>";

     echo "<td>";
   
     echo $turista->id;
 
     echo "</td>";

     echo "<td>";
   
     echo $turista->nombre;
 
     echo "</td>";
     echo "<td>";
   
     echo $turista->apellido1;
 
     echo "</td>";

     echo "<td>";
   
     echo $turista->apellido2;
 
     echo "</td>";

     echo "<td>";
   
     echo $turista->direccion;
 
     echo "</td>";

     echo "<td>";
   
     echo $turista->telefono;
 
     echo "</td>";

    
     echo "</tr>";
    
 }
 echo "</table>";
 echo "<br>";

 echo "<table border =2>";
 echo "<h3> array lazy </h3>";
 echo "<th>", "id", "</th>";
 echo "<th>", "nombre", "</th>";
 echo "<th>", "apellido1", "</th>";
 echo "<th>", "apellido2", "</th>";
 echo "<th>", "direccion", "</th>";
 echo "<th>", "telefono", "</th>";

 while($turista =$turistas5->fetch(PDO::FETCH_LAZY)){

  echo "<tr>";

  echo "<td>";

  echo $turista->id;

  echo "</td>";

  echo "<td>";

  echo $turista->nombre;

  echo "</td>";
  echo "<td>";

  echo $turista->apellido1;

  echo "</td>";

  echo "<td>";

  echo $turista->apellido2;

  echo "</td>";

  echo "<td>";

  echo $turista->direccion;

  echo "</td>";

  echo "<td>";

  echo $turista->telefono;

  echo "</td>";

 
  echo "</tr>";
 
}
echo "</table>";
echo "<br>";


$turistas6->bindColumn(1, $id);
$turistas6->bindColumn(2, $nombre);
$turistas6->bindColumn(3, $apellido1);
$turistas6->bindColumn(4, $apellido2);
$turistas6->bindColumn(5, $direccion);
$turistas6->bindColumn(6, $telefono);

echo "<table border =2>";
 echo "<h3> array bound </h3>";
 echo "<th>", "id", "</th>";
 echo "<th>", "nombre", "</th>";
 echo "<th>", "apellido1", "</th>";
 echo "<th>", "apellido2", "</th>";
 echo "<th>", "direccion", "</th>";
 echo "<th>", "telefono", "</th>";

while($pdo =$turistas6->fetch(PDO::FETCH_BOUND)){

    echo "<tr>";
  
    echo "<td>";
  
    echo $id;
  
    echo "</td>";
  
    echo "<td>";
  
    echo $nombre;
  
    echo "</td>";
    echo "<td>";
  
    echo $apellido1;
  
    echo "</td>";
  
    echo "<td>";
  
    echo $apellido2;
  
    echo "</td>";
  
    echo "<td>";
  
    echo $direccion;
  
    echo "</td>";
  
    echo "<td>";
  
    echo $telefono;
  
    echo "</td>";
  
   
    echo "</tr>";
   
  }
  echo "</table>";
  echo "<br>";
        
           
       
    } catch (PDOException $e) {
        echo "Conexion fallida" . $e->getMessage();
    }
    $conn=null;
    ?>
</body>
</html>pdo