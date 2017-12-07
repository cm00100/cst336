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

$term = mysql_real_escape_string($_REQUEST['term']);    

$sql = "SELECT * FROM album WHERE artist_name LIKE '%".$term."%'";
$r_query = mysql_query($sql);

while ($row = mysql_fetch_array($r_query)){ 
echo 'Primary key: ' .$row['PRIMARYKEY']; 
echo '<br /> Artist: ' .$row['artist_name']; 
echo '<br /> Album: '.$row['album_title']; 


}
?>