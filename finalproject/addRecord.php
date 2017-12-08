<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("dbConnection.php");
 $conn = getDatabaseConnection();




if (isset($_GET['addRecordForm'])){

    $album_title = $_GET['album_title'];
    $album_genre = $_GET['album_genre'];
    $album_year    = $_GET['album_year'];
    $artist_name = $_GET['artist_name'];
    $priceId    = $_GET['priceId'];
    $album_condition    = $_GET['album_condition'];

 
    
    
    $sql = "INSERT INTO album
            (album_title, album_genre, album_year, artist_name, priceId, album_condition)
            VALUES
            (:at, :ag, :ay, :an, :p, :acondition)";
            
    
    $namedParameters = array();
    $namedParameters[':at'] =  $album_title;
    $namedParameters[':ag'] =  $album_genre;
    $namedParameters[':ay'] =  $album_year;
    $namedParameters[':an'] =  $artist_name;
    $namedParameters[':p'] = $priceId;
    $namedParameters[':acondition'] = $album_condition;

    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    
    
    
    $sql = "INSERT IGNORE INTO artist
            (artist_name)
            VALUES
            (:an)";
            
    $artistParameter = array();
    $artistParameter[':an'] = $artist_name;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($artistParameter);
        
  
  
    
    echo "Record has been added successfully!";
            
}

?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link  href="css/style.css" rel="stylesheet" type="text/css" />

        <title> Admin: Adding New Record </title>
    </head>
    <body>

    <div id="spacer"></div>
     <div id="otherForms">
    <fieldset>
        
        <p><legend> Admin: Add New Album </legend></p>
        
       
        <form>
           <p>Artist Name: <input type="text" name="artist_name" required/> </p>
            <p>Album Name: <input type="text" name="album_title" required /> </p>
            <p>Album Genre: <input type="text" name="album_genre"/> </p>
            <p>Album Year: <input type="text" name="album_year" required/> </p>
            <p>Price: <input type="text" name="priceId" required/> </p>
            Condition:  <select name="album_condition" required>
                        <option value=""> Select One </option>
                        <option>New</option>
                        <option>Used</option>
                    </select> 
            <br />
            
                <p></p>
            
                <input type="submit" name="addRecordForm" value="Add Album"/>
        </form>
        
    </fieldset>
    
    <p></p>
    
     <form action="admin.php">
            
            <input type="submit" value="Back" />
            
        </form>
    </div>
    
    </body>
</html>