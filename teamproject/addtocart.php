<?php

session_start();

include 'dbConnection.php';

$conn = getDatabaseConnection();

function displayCandy() {
    global $conn;
    $sql = "SELECT * 
            FROM candy
            WHERE candyId = " . $_GET['candyId'];
    $statement = $conn->prepare($sql);
    $statement->execute();
    $candy = $statement->fetch(PDO::FETCH_ASSOC);
    return $candy;
}

    $candy = displayCandy();
    
    $candyname = $candy['candyName'];
    $candyprice =$candy['priceId'];
    
    
    $_SESSION['cart'][] = $candyname;
    $_SESSION['price'][]= $candyprice;

       
    header("Location: index.php");
        
        

?>
