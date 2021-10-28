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
    try{ 
     $connexion=new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
     echo "Conectado correctamente";
     echo "<br>";
     $sql="DELETE from turista WHERE id=10";
     $nClientes=$connexion->exec ($sql);
     echo "Se han eliminado $nClientes clientes  ";
     $sql2= "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Wayne', 'Rooney', 'Martínez', 'Trebujena', '6666666')";
     $insClientes=$connexion->exec ($sql2);
     echo "Se han insertado $insClientes clientes  ";
    $sql3= "UPDATE turista SET nombre='Rosa', apellido1='Gonzalez', apellido2='Muñoz', direccion= 'Inglaterra' , telefono = '111111' WHERE id=6";
    $updClientes=$connexion->exec ($sql3);
    echo "Se han updateado $updClientes clientes  ";
    }catch(PDOException $e){
        echo "Conexion fallida: " .$e->getMessage();
    }
    $connexion=null;
    ?>
</body>
</html>