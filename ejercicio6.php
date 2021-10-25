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
        
        $sql="UPDATE vuelos SET Company=?  WHERE id=?";
        mysqli_stmt_init($mysqli);
        if($stmt=mysqli_prepare($mysqli, $sql)){
            mysqli_stmt_bind_param($stmt, "si",  $newCompany, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
            echo "Compañia modificada <br>";
        }else{
            echo "error al modificar la compañia <br>";
        }

    }
    
    function deleteFlight($id){
        $mysqli=creaConexion();
      
        $sql="DELETE FROM `vuelos` WHERE id=?";
        mysqli_stmt_init($mysqli);
        if($stmt=mysqli_prepare($mysqli, $sql)){
            mysqli_stmt_bind_param($stmt, "i",  $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
            echo "vuelo borrado exitosamente <br>";
        }else{
            echo "error al borrar el vuelo <br>";
        }

    }

    function getFlights(){
        $mysqli=creaConexion();
        $sql="SELECT * FROM `vuelos`";
        mysqli_stmt_init($mysqli);
        if($stmt=mysqli_prepare($mysqli, $sql)){
            mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$id,$origen, $destino, $fecha, $company, $modelo_avion);
        while(mysqli_stmt_fetch($stmt)){
         echo "El vuelo con origen $origen y destino $destino tiene fecha prevista $fecha y es operado por $company con el modelo $modelo_avion";
            }
        }
        
        mysqli_stmt_close($stmt);
    }


   
   ?>
</body>
</html>