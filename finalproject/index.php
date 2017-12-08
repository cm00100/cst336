<?php
session_start();



include 'dbConnection.php';
$conn = getDatabaseConnection();


?>


<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link  href="css/style.css" rel="stylesheet" type="text/css" />


        <title> Music Records Shop </title>
    </head>
    <body>
        
       <h1> Music Records Shop</h1>
        
        <p><button><a href="login.php">Admin Login</a></button></p>
        
        <div id="search-wrap">

            <form action="" method="post">  
            Search Artist: <input type="text" name="search" /> 
            <input type="submit" value="Submit" />  
            </form> 
        </div>
        
     
        
        
        <p></p>
        
        
         <?php
         
        echo"<div id='catalog'>";
        
        echo"   <div id='showAll'>
        <form action='' method='post'>   
        <input type='submit' value='Show All Records' />  
        </form>
        </div>";
   
       
        $search_value=$_POST["search"];
        $sql="SELECT * FROM album WHERE artist_name LIKE '%$search_value%'";               
        $stmt = $conn->query($sql);

            
        while($records=$stmt->fetch()){
            echo "<strong>" . $records['album_title'] ."</strong>";
            echo "<br>";
            echo "by " . $records['artist_name'];
           echo "<p></p>";

            echo "Release Year: " .$records['album_year'];
                        echo "<br>";

            echo "Condition: ". $records['album_condition'];
            echo "<br>";
            echo "Price: $" . $records['priceId'];

            echo "<p></p>";
            echo "<hr>";
            
        }
       
         echo "</div>"; 
        ?>

    </body>
</html>