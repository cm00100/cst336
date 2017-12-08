<?php

        session_start();

        if (!isset($_SESSION['username'])) { 
    
    header("Location: index.php");
    exit();
    
}

        include 'dbConnection.php';
        $conn = getDatabaseConnection();
        
        
        echo"<p></p>";
        
        echo "Total Artists: ";
       
        $sql = "SELECT COUNT(*)
		FROM artist";
		
        $stmt = $conn->query($sql);	
        $totalArtists = $stmt->fetchAll();
        
        
        foreach($totalArtists as $artists) {
       
        echo  $artists['COUNT(*)'] ;
        
        }
        
        
        
   
        echo "</br>Total Albums: ";
        
        $sql = "SELECT COUNT(*)
		FROM album";
		
        $stmt = $conn->query($sql);	
        $totalAlbums = $stmt->fetchAll();
        
        
        foreach($totalAlbums as $albums) {
       
        echo  $albums['COUNT(*)'] ;
        
        }

        
       echo "</br>Average Price of Albums: ";
       
       $sql = "SELECT AVG(priceId)
		FROM album";
		
        $stmt = $conn->query($sql);	
        $averagePrice = $stmt->fetchAll();
        
        
        foreach($averagePrice as $avg) {
        
        $num = $avg['AVG(priceId)'];
        $formattedNum = number_format($num, 2);
        echo "$". $formattedNum;
       
   
        
        }

        
      



?>