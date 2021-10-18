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
   
   $yo="Jesus,181,90,rubio,carne,azul,1990,masculino,hombre,humano";
        $file=fopen("archivo.txt", "r");
        echo "<table border=2>";
        echo 
        "<th>Nombre</th>
        <th>Altura</th>
        <th>Peso</th>
        <th>ColorPelo</th>
        <th>ColorPiel</th>
        <th>ColorOjos</th>
        <th>Edad</th>
        <th>Genero</th>
        <th>Procedencia</th>
        <th>Especie";
    
      while (feof($file)!=true){  //recorre el archivo, mientras que el fichero no esté terminado.
          
      $datos=fgets($file); //fgets para devolver la siguiente fila no leida
          list($nombre, $altura, $peso, $color_pelo, $color_piel, $color_ojos, $edad, $genero, $procedencia, $especie)=explode(",", $datos);
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
          echo "<td>", "$especie", "</td>";
        echo"</tr>";
       
  
      }
     
    
      echo "</table>";
      fclose($file);
  
      $file = fopen("archivo.txt", "a");
      fwrite($file, $yo);
      fclose($file);
    ?>
</body>
</html>
