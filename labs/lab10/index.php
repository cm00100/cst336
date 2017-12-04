<?php

  //print_r($_FILES);
  //echo "File size " . $_FILES['myFile']['size'];
  move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
  
  $files = scandir("gallery/", 1);
 // print_r($files);
  
  for ($i = 0; $i < count($files) - 2; $i++) {
     
     echo "<img src='gallery/" .   $files[$i] . "' width='50' >";
      
  }
  
  if($_FILES['name']['size'] > 1048576)
  {
    echo "File is bigger than 1 MB";   
  }
  
  

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
    </head>
    <body>

    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 


        <input id="image-file" type="file" name="myFile" /> 
        
        <input type="submit" value="Upload File!" />
        
        
        
        
        

    </form>


    </body>
</html>