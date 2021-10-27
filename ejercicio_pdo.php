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
       while($turista =$turistas->fetch()){
           echo "El turista de nombre ".$turista['nombre']." ".$turista['apellido1']." ".$turista['apellido2']." es de ".$turista['direccion']."<br/>";
       }
    } catch (PDOException $e) {
        echo "Conexion fallida" . $e->getMessage();
    }
    $conn=null;
    ?>
</body>
</html>