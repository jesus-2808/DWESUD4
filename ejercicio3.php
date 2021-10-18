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

$libros = new SimpleXMLElement('fichero.xml', 0, true);
foreach ($libros as $book){
    echo "author: ". $book->author ."<br>";
    echo "title: ". $book->title ."<br>";
    echo "genre: ". $book->genre ."<br>";
    echo "price: ". $book->price ."<br>";
    echo "publish_date: ". $book->publish_date ."<br>";
    echo "description: ". $book->description."<br>";
    echo "<br>";

}
    ?>
</body>
</html>