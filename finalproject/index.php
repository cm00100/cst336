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

?>


<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link  href="css/style.css" rel="stylesheet" type="text/css" />

        <title> Music Records Shop </title>
    </head>
    <body>
        
       <h1> Music Records</h1>
        
        <p><button><a href="login.php">Admin Login</a></button></p>

        
         <?php
        
        $records = displayRecords();
     
        
        foreach($records as $record) {
            
            echo $record['artist_name'] . '  ' .$record['album_title'] . "  " . $record['album_year'] . '  ' . $record['album_condition'] . '  $' . $record['priceId'];;
       
            echo "<br />";
            
        }
        
        
        
        ?>

    </body>
</html>