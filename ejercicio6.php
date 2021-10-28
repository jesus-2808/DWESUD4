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
    @$mysqli=mysqli_connect('localhost', 'developer', 'developer', 'agenciaviajes');  //en casa root, 2808
    $error=mysqli_connect_errno();
        if($error!=null){
            echo"<p>error $error conectando a la base de datos:", mysqli_connect_error(),"</p>";
            exit();
    }
    return $mysqli;
}

function creaVuelo($origen, $destino, $fecha, $company, $modelo_avion) { 
    $mysqli=creaConexion();
    
    $sql= "INSERT INTO vuelos (Origen, Destino, Fecha, Company, Modelo_avion) VALUES (?,?,?,?,?)";
    mysqli_stmt_init($mysqli);
    if($stmt=mysqli_prepare($mysqli, $sql)){
        mysqli_stmt_bind_param($stmt, "sssss", $origen, $destino, $fecha, $company, $modelo_avion);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo "Vuelo creado con exito <br>";
    }else{
        echo "error al crear el vuelo <br>";
    }
}

   
    function modificaDestino ($nuevoDestino, $id ){
     $mysqli=creaConexion();
    
     $sql= "UPDATE vuelos SET Destino=? WHERE id=?";
     mysqli_stmt_init($mysqli);
     if($stmt=mysqli_prepare($mysqli, $sql)){
         mysqli_stmt_bind_param($stmt, "si", $nuevoDestino, $id);
         mysqli_stmt_execute($stmt);
        
         mysqli_stmt_close($stmt);
     
    }
    }

    function actualizaCompany( $newCompany, $id){
        $mysqli=creaConexion();
        $retorno=false;
        $sql="UPDATE vuelos SET Company=?  WHERE id=?";
        mysqli_stmt_init($mysqli);
        if($stmt=mysqli_prepare($mysqli, $sql)){
            mysqli_stmt_bind_param($stmt, "si",  $newCompany, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
        }
        mysqli_close($mysqli);
        return $retorno;
        }

    
    
    function deleteFlight($id){
        $mysqli=creaConexion();
      
        $sql="DELETE FROM `vuelos` WHERE id=?";
        mysqli_stmt_init($mysqli);
        if($stmt=mysqli_prepare($mysqli, $sql)){
            mysqli_stmt_bind_param($stmt, "i",  $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
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
        $result=mysqli_query($mysqli, $sql);
        if($stmt=mysqli_prepare($mysqli, $sql)){
            mysqli_stmt_execute($stmt);
    
            echo "<table border =2>";
            echo "<th>", "id", "</th>";
            echo "<th>", "Origen", "</th>";
            echo "<th>", "Fecha", "</th>";
            echo "<th>", "Destino", "</th>";
            echo "<th>", "Company", "</th>";
            echo "<th>", "modelo_avion", "</th>";
        while($fila=mysqli_fetch_assoc($result)){
            
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
        
        mysqli_stmt_close($stmt);
    }
    

   
   ?>
</body>
</html>