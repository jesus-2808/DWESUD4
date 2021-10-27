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
    
function creaConexion(){
    @$mysqli=new mysqli('localhost', 'developer', 'developer', 'agenciaviajes');  //en casa root, 2808
   $error= $mysqli -> connect_errno;
        if($error!=null){
            echo"<p>error $error conectando a la base de datos:", mysqli_connect_error(),"</p>";
            exit();
    }
    return $mysqli;
}

    function creaVuelo($origen, $destino, $fecha, $company, $modelo_avion) { 
        $mysqli=creaConexion();
        
        $sql= "INSERT INTO vuelos (Origen, Destino, Fecha, Company, Modelo_avion) VALUES (?,?,?,?,?)";
        $mysqli->stmt_init();
        if($stmt=$mysqli->prepare($sql)){
           $stmt ->bind_param("sssss", $origen, $destino, $fecha, $company, $modelo_avion);
           $stmt->execute();
           $stmt ->close();
           $mysqli ->close();
           

          return true;
        }else{
           return false;
           $mysqli ->close();
        }
    }

   
    function modificaDestino ($nuevoDestino, $id ){
        $mysqli=creaConexion();
        $retorno=false;
        $sql= "UPDATE vuelos SET Destino=? WHERE id=?";
        $mysqli ->stmt_init();
        if($stmt=$mysqli->prepare ($sql)){
            $stmt->bind_param("si", $nuevoDestino, $id);
            $stmt->execute();
            $stmt->close();
        }
        $mysqli -> close();
        return $retorno;
    }

    function actualizaCompany( $newCompany, $id){
        $mysqli=creaConexion();
        $retorno=false;
        $sql="UPDATE vuelos SET Company=?  WHERE id=?";
        $mysqli->stmt_init();
        if($stmt=$mysqli->prepare ($sql)){
            $stmt->bind_param("si",  $newCompany, $id);
         $retorno= $stmt->execute();
            $stmt->close();
    
        }
        $mysqli -> close();
        return $retorno;
    }

    
    
    function deleteFlight($origen){
        $mysqli=creaConexion();
      
        $sql="DELETE FROM `vuelos` WHERE Origen=?";
        $mysqli->stmt_init();
        if($stmt=$mysqli->prepare ($sql)){
           $stmt->bind_param ( "s",  $origen);
           $stmt->execute();
           $stmt->close();
            
            //if    mysqli_stmt_execute($stmt);
            echo "vuelo borrado exitosamente <br>";
        }else{
            echo "error al borrar el vuelo <br>";
        }

    }

    function getFlights(){
        $mysqli=creaConexion();
        $sql="SELECT * FROM `vuelos`";
        mysqli_stmt_init($mysqli);
        $result=$mysqli -> query($sql);
        if($stmt=$mysqli->prepare($sql)){
            $stmt->execute();
    
            echo "<table border =2>";
            echo "<th>", "id", "</th>";
            echo "<th>", "Origen", "</th>";
            echo "<th>", "Fecha", "</th>";
            echo "<th>", "Destino", "</th>";
            echo "<th>", "Company", "</th>";
            echo "<th>", "modelo_avion", "</th>";
        while($fila=$result -> fetch_assoc()){
            
            echo "<tr>";

            echo "<td>";
          
            echo $fila['id'];
        
            echo "</td>";
            echo "<td>";
          
            echo $fila['Origen'];
        
            echo "</td>";
    
            echo "<td>";
          
            echo $fila['Fecha'];
        
            echo "</td>";
    
            echo "<td>";
          
            echo $fila['Destino'];
        
            echo "</td>";
    
            echo "<td>";
          
            echo $fila['Company'];
        
            echo "</td>";
    
            echo "<td>";
          
            echo $fila['Modelo_avion'];
        
            echo "</td>";
            
            echo "</tr>";
           
        }
        echo "</table>";
        echo "<br>";
            
        }

    
      
        
      
    }
    
    creaVuelo("Sevilla","Bucarest","2021-11-26 16:12:53","Ryanair","Boeing 747");
    modificaDestino("Manchester", 25);
    actualizaCompany( "Iberia", 28);
    deleteFlight("Malaga");
    getFlights();
   
   ?>
</body>
</html>