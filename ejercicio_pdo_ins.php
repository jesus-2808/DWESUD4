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
     $sql="INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Jesús', 'Gonzalez', 'Munoz', 'mi_casa', '6666666')";
     $nClientes=$connexion->exec ($sql);
     $lastIndex=$connexion ->lastInsertId();
     echo "Se han añadido $nClientes clientes nuevos con el: $lastIndex";
    }catch(PDOException $e){
        echo "Conexion fallida: " .$e->getMessage();
    }
    $connexion=null;
    ?>
</body>
</html>