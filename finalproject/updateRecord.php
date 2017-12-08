<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("dbConnection.php");
 $conn = getDatabaseConnection();



function getAlbumInfo($albumId) {
    global $conn;    
    $sql = "SELECT * 
            FROM album
            WHERE albumId = $albumId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
}

if (isset($_GET['updateRecordForm'])) { //admin has submitted form to update user

    $artist_name = $_GET['artist_name'];

    
    $sql = "UPDATE album
            SET album_title = :aTitle,
                artist_name = :aName,
                album_genre = :aGenre,
                album_year = :aYear,
                priceId = :pID,
                album_condition = :aCondition
            
			WHERE albumId = :albumId";
	$namedParameters = array();
	$namedParameters[":aTitle"] = $_GET['album_title'];
	$namedParameters[":aName"] = $_GET['artist_name'];
	$namedParameters[":aGenre"] = $_GET['album_genre'];
	$namedParameters[":aYear"] = $_GET['album_year'];
	$namedParameters[":pID"] = $_GET['priceId'];
	$namedParameters[":aCondition"] = $_GET['album_condition'];


	
	$namedParameters[":albumId"] = $_GET['albumId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    
    $sql = "INSERT IGNORE INTO artist
            (artist_name)
            VALUES
            (:aName)";
            
    $artistParameter = array();
    $artistParameter[':aName'] = $artist_name;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($artistParameter);
    
    echo "Record has been updated successfully!";

        
    
}



if (isset($_GET['albumId'])) {
    
    $albumInfo = getAlbumInfo($_GET['albumId']);
    
    
}





?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link  href="css/style.css" rel="stylesheet" type="text/css" />

        <title> Admin: Updating Album </title>
    </head>
    <body>
    <div id="spacer"></div>
    
    <div id="otherForms">

    <fieldset>
        
       <p> <legend> Admin: Update Album </legend></p>
        
        <form>
       
            <input type="hidden" name="albumId" value="<?=$albumInfo['albumId']?>" />
            <p>Artist Name: <input type="text" name="artist_name" required value="<?=$albumInfo['artist_name']?>" /> </p>
            <p>Album Name: <input type="text" name="album_title" required value="<?=$albumInfo['album_title']?>" /> </p>
            <p>Album Genre: <input type="text" name="album_genre" required value="<?=$albumInfo['album_genre']?>"/> </p>
            <p>Album Year: <input type="text" name="album_year" required value="<?=$albumInfo['album_year']?>"/> </p>
            <p>Price: <input type="text" name="priceId" required value="<?=$albumInfo['priceId']?>"/> </p>
            Condition:  <select name="album_condition" required value="<?=$albumInfo['album_condition']?>"/> >
                        <option value=""> Select One </option>
                        <option>New</option>
                        <option>Used</option>
                    </select>  <br>
           
               <p></p>
           
                <p><input type="submit" name="updateRecordForm" value="Update Album"/></p>
        </form>
        
    </fieldset>
    
     <form action="admin.php">
            
            <input type="submit" value="Back" />
            
    </form>
    
    </div>
    
   


    </body>
</html>