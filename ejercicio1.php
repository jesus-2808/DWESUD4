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
   

        $file=fopen("archivo.txt", "r");
       
      
      

   
     echo "<table border =2>";
  
      $datos=fgets($file);
      while (feof($file)!=true){
          
          list($nombre, $altura, $peso, $color_pelo, $color_piel, $color_ojos, $edad, $genero, $procedencia)=explode(",", $datos);
        echo "<tr>";
          echo "<td>", "$nombre", "</td>";
          echo "<td>", "$altura", "</td>";
          echo "<td>", "$peso", "</td>";
          echo "<td>", "$color_pelo", "</td>";
          echo "<td>", "$color_piel", "</td>";
          echo "<td>", "$color_ojos", "</td>";
          echo "<td>", "$edad", "</td>";
          echo "<td>", "$genero", "</td>";
          echo "<td>", "$procedencia", "</td>";
        echo"</tr>";
       $datos=fgets($file);
  
      }
     
    
        echo " </table> ";
        fclose($file);
       // $datos_yo= "Jesus, 181,90, rubio, blanco, azul,31, hombre, tierra, humano";
      //  $file=fopen("archivo.txt", "a");
        //fwrite($file, $datos_yo);
        //fclose($file);
    ?>
</body>
</html>