<?php
session_start();



include 'dbConnection.php';
$conn = getDatabaseConnection();


function displayRecords() {
    global $conn;
    $sql = "SELECT * 
            FROM album
            ORDER BY artist_name ASC";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function getArtistInfo(){
    global $conn;        
    $sql = "SELECT name, artistId 
            FROM artist
            ORDER BY name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $artists = $stmt->fetchAll();
    
    return $artists;


}


function orderPrice($count) {
    global $conn;
    if($count == 1) {
        $sql = "SELECT * FROM `album` ORDER BY `album`.`priceId` ASC";
    }
    else {
        $sql = "SELECT * FROM `album` ORDER BY `album`.`priceId` DESC"; 
    }
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

function orderArtist($count) {
    global $conn;
    if($count == 1) {
        $sql = "SELECT * FROM `album` ORDER BY `album`.`artist_name` ASC";
    }
    else {
        $sql = "SELECT * FROM `album` ORDER BY `album`.`artist_name` DESC"; 
    }
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}

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

        
        <form action="form.php" method="post"> 
            Search: <input type="text" name="term" /><br /> 
            <input type="submit" value="Submit" /> 
        </form>
        
        
        
         <form action='index.php' style='display:inline' method="get">
                <input type="submit" name="artist" value="Order by Artist" />
                <input type="radio" id="ascending1" name="ordering" value="1">
                <label for="ascending1">Ascending</label>
                <input type="radio" id="descending1" name="ordering" value="2">
                <label for="descending1">Descending</label>
            </form>
            <br />
        
          <form action='index.php' style='display:inline' method="get">
                <input type="submit" name="price" value="Order by Price" />
                <input type="radio" id="ascending1" name="ordering" value="1">
                <label for="ascending1">Lowest Price</label>
                <input type="radio" id="descending1" name="ordering" value="2">
                <label for="descending1">Highest Price</label>
            </form>
            <br />
            <form 
                action='index.php' method="get">
            </form>
            
            
            
        
        
         <?php
         
        
            // Sorts Candy Shop's inventory based off Radio Buttons
            $order = $_GET['ordering'];

           
            
           
            if(isset($_GET['price'])) {
                $records = orderPrice($order);
            }
            else if(isset($_GET['artist'])) {
                $records = orderArtist($order);
            }
            else {
                $records = displayRecords();
            }
            

        
       // $records = displayRecords();
        
        
     
        
        foreach($records as $record) {
            
            echo $record['artist_name'] . '  ' .$record['album_title'] . "  " . $record['album_year'] . '  ' . $record['album_condition'] . '  $' . $record['priceId'];;
       
            echo "<br />";
            
        }
        
        
        
        ?>

    </body>
</html>