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
     $sql="UPDATE turista SET nombre='Leticia', apellido1='Gonzalez', apellido2='Muñoz', direccion= 'Inglaterra' , telefono = '111111' WHERE id=3";
     $nClientes=$connexion->exec ($sql);
    
     echo "Se han modificado $nClientes clientes  ";
    }catch(PDOException $e){
        echo "Conexion fallida: " .$e->getMessage();
    }
    $connexion=null;
    ?>
</body>
</html>