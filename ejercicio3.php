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
  //  if(!$contenido = simplexml_load_file('fichero.xml')){
       // echo "No se ha podido cargar el archivo";
 
//} else {
   // foreach ($contenido as $book){
       // echo 'author: '.$book->author.'<br>';
        //echo 'title: '.$book->title.'<br>';
       // echo 'genre: '.$book->genre.'<br>';
        //echo 'price: '.$book->price.'<br>';
       // echo 'publish_date: '.$book->publish_date.'<br>';
        //echo 'description: '.$book->description.'<br>';
      
   // echo "<br>";
   // }
//}
$informacion = simplexml_load_file("fichero.xml");
$contador = 0;

foreach($informacion as $elementoHijo) {
    if ($contador == 1) {
        printf("Titulo: %s Genero: %s Precio: %s Fecha: %s Descripcion: %s", $elementoHijo->title, $elementoHijo->genre, $elementoHijo->price, $elementoHijo->publish_date, $elementoHijo->description);
        break;
    }
    $contador++;
}

$libros = new SimpleXMLElement('fichero.xml', 0, true);



echo "<table border =2>";
    
echo "<th>", "Autor", "</th>";
echo "<th>", "titulo", "</th>";
echo "<th>", "Género", "</th>";
echo "<th>", "Precio", "</th>";
echo "<th>", "fecha_publicacion", "</th>";
echo "<th>", "descripcion", "</th>";
echo "<tr>";
foreach ($libros as $book){

   
    echo "<tr>";
    echo "<td>";
  
    echo $book->author ;

    echo "</td>";

   
    echo "<td>";
  
    echo $book->title;

    echo "</td>";
    
    
    echo "<td>";
  
    echo  $book->genre;

    echo "</td>";

    echo "<td>";
  
    echo $book->price;

    echo "</td>";

    echo "<td>";
  
    echo  $book->publish_date;

    echo "</td>";
    echo "<td>";
  
    echo  $book->description;

    echo "</td>";
    echo "</tr>";
   
  }
 

    echo " </table> ";
    echo "<br>";

    $nuevo_libro=$libros->addChild("book");
    $nuevo_libro->addAttribute("id445", "bk42143");
    $nuevo_libro->addAttribute("author", "Kepa Jametxo");
    $nuevo_libro->addAttribute("title", "el libro de petete");
    $nuevo_libro->addAttribute("genre", "Risa");
    $nuevo_libro->addAttribute("price", "13.31");
    $nuevo_libro->addAttribute("publish_date", "2018-09-09");
    $nuevo_libro->addAttribute("description", "te vas a partir");
    $libros->asXML("fichero.xml");

    echo "<table border =2>";
    
    echo "<th>", "Autor", "</th>";
    echo "<th>", "titulo", "</th>";
    echo "<th>", "Género", "</th>";
    echo "<th>", "Precio", "</th>";
    echo "<th>", "fecha_publicacion", "</th>";
    echo "<th>", "descripcion", "</th>";
    echo "<tr>";
foreach ($libros->book as $valor){
    echo "<tr>";
    echo "<td>";
  
    echo $valor->author ;

    echo "</td>";

   
    echo "<td>";
  
    echo $valor->title;

    echo "</td>";
    
    
    echo "<td>";
  
    echo  $valor->genre;

    echo "</td>";

    echo "<td>";
  
    echo $valor->price;

    echo "</td>";

    echo "<td>";
  
    echo  $valor->publish_date;

    echo "</td>";
    echo "<td>";
  
    echo  $valor->description;

    echo "</td>";
    echo "</tr>";
   
  }
 

    echo " </table> ";

    ?>
</body>
</html>