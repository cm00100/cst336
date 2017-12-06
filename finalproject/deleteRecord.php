<?php

    include("dbConnection.php");
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM album 
            WHERE albumId = " . $_GET['albumId'];

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: admin.php");
    
?>