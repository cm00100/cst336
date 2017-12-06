<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}

include 'dbConnection.php';
$conn = getDatabaseConnection();


function displayRecords() {
    global $conn;
    $sql = "SELECT * 
            FROM album
            ORDER BY artist_name";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    return $records;
}




?>
<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link  href="css/style.css" rel="stylesheet" type="text/css" />

        <title>Admin Page </title>
        <script>
            
            function confirmDelete(album) {
                
                
                return confirm("Are you sure you want to delete " + album + "?");
                
            }
            
            
        </script>
    </head>
    <body>

        <h1> ADMIN PAGE </h1>
        <h2> Welcome <?=$_SESSION['username']?>! </h2>
        
        <hr>
        
        <form action="addRecord.php">
            
            <input type="submit" value="Add New Album" />
            
        </form>
        
          <form action="logout.php">
            
            <input type="submit" value="Logout" />
            
        </form>
        
        
        <br /><br />
        
        <?php
        
        $records = displayRecords();
        
        
        foreach($records as $record) {
            
            echo $record['artist_name'] . '  ' . $record['album_title'] . "  " . $record['album_year']  . '  ' . $record['album_condition']. '  $' . $record['priceId'];
;
            echo "[<a href='updateRecord.php?albumId=".$record['albumId']."'> Update </a> ]";
            //echo "[<a href='deleteUser.php?userId=".$user['userId']."'> Delete </a> ]";
            echo "<form action='deleteRecord.php' style='display:inline' onsubmit='return confirmDelete(\"".$record['album_title']."\")'>
                     <input type='hidden' name='albumId' value='".$record['albumId']."' />
                     <input type='submit' value='Delete'>
                  </form>
                ";
            
            echo "<br />";
            
        }
        
        
        ?>
        
        
        <h2>REPORTS</h2>
        
        Total of Artists:
        
        Average Price of Albums:
        
        Total of Albums:         
        
    </body>     
</html>