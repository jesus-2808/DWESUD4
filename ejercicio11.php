<?php
 
function creaConexion(){
  $servidor = "localhost";
 $baseDatos = "agenciaviajes";
 $usuario = "developer";
 $pass = "developer";
    try{
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
    return $conexion;
   
 
    }catch (PDOException $e){
        return false;
        echo"Connection fallida: " . $e->getMessage();
    }
}
    function creaTurista( $nombre, $apellido1, $apellido2,  $direccion, $telefono){
      $conexion=creaConexion();
 
     
      $sql = $conexion->prepare("INSERT into turista values(null,:nombre,:apellido1,:apellido2,:direccion,:telefono)");
      $sql->bindParam(":nombre", $nombre);
      $sql->bindParam(":apellido1", $apellido1);
      $sql->bindParam(":apellido2", $apellido2);
      $sql->bindParam(":telefono", $telefono);
      $sql->bindParam(":direccion", $direccion);
      $sql->execute();
      $id = $conexion->lastInsertId();
      $conexion = null;
      return $id;
    }
    function extraeTurista($id){
        $conexion=creaConexion();
        $sql=$conexion->prepare("SELECT * from turista where id=:id");
     
        $sql->bindParam(":id", $id);
        $sql->execute();
     while ($fila=$sql->fetch()) {
      echo $fila['id'], $fila['nombre'], $fila['apellido1'],  $fila['apellido2'],  $fila['direccion'],  $fila['telefono'];
      echo "<br>";
    }
      $conexion=null;
        return $fila;
       
        }
    function extraeTuristas() {
        $con = creaConexion();
        $sql = $con->prepare("SELECT * from turista;");
        $sql->execute();
        $arrayTur = [];
        $counter = 0;
        echo "<table border =2>";
        echo "<th>", "id", "</th>";
        echo "<th>", "Nombre", "</th>";
        echo "<th>", "Apellido1", "</th>";
        echo "<th>", "Apellido2", "</th>";
        echo "<th>", "Direccion", "</th>";
        echo "<th>", "Telefono", "</th>";
        while ($fila = $sql->fetch()) {
           
            echo "<tr>";
 
            echo "<td>";
         
            echo $fila['id'];
       
            echo "</td>";
            echo "<td>";
         
            echo $fila['nombre'];
       
            echo "</td>";
   
            echo "<td>";
         
            echo $fila['apellido1'];
       
            echo "</td>";
   
            echo "<td>";
         
            echo $fila['apellido2'];
       
            echo "</td>";
   
            echo "<td>";
         
            echo $fila['direccion'];
       
            echo "</td>";
   
            echo "<td>";
         
            echo $fila['telefono'];
       
            echo "</td>";
           
            echo "</tr>";
            $counter++;
        }
        echo "</table>";
        echo "<br>";
        $con = null;
        return $arrayTur;
    }
 
  function updateTurista( $address, $phone, $id){

    $conexion=creaConexion();
    $updated=false;
     
    $sql = $conexion->prepare("UPDATE turista SET direccion=?, telefono=? WHERE id=?");
   
        $sql->bindParam(1,  $address);
        $sql->bindParam(2,  $phone);
        $sql->bindParam(3,  $id);
     if($updated= $sql->execute()){
         $updated=true;
     }else{
         $updated=false;
     }
       $conexion=null;
    return $updated;
   
  }

     
  function eliminaTurista($id){
      $conexion=creaConexion();
     
      $sql=$conexion->prepare("DELETE FROM turista WHERE id=?");
      $sql->bindParam(1, $id);
     $delete= $sql->execute();
     $conexion=null;
    return $delete;
  }
       
 
//creaTurista("Alejandro", "Magno", "de Grecia", "Macedonia",  6746624);
 
//extraeTurista(3);
 
extraeTuristas();
 
//updateTurista('familia que se elige', '65735724', 22);
//eliminaTurista(13);
?>


