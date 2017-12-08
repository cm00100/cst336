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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

        <title>Admin Page </title>
        <script>
            
            function confirmDelete(album) {
                
                
                return confirm("Are you sure you want to delete " + album + "? Note: Artist will still remain in database.");
                
            }
            
            
        </script>
    </head>
    <body>

       
     
        
       
       <div id="adminLogin">
        
          <form action="logout.php">
            
            <input type="submit" value="Logout" />
            
        </form>
        
        </div>
        
       <div id="spacer">Music Record Shop <img src="musicrecord.png" width="100"></div>

          
        
        
        <script>
            $(document).ready(function(){
                $("button").click(function(){
                    $.ajax({url: "report.php", success: function(result){
                        $("#div1").html(result);
                    }});
                });
            });
        </script>
        
        

        
        
        <br /><br />
        
        

        
        
        <div id="search-wrap">
            <form action="" method="post">  
            Search Artist: <input type="text" name="search" />  
            <input type="submit" value="Submit" />  
            </form> 
            <p></p>
            <h2> Welcome, <?=$_SESSION['username']?>! </h2>

            
            
        </div>
        
    
         
        
        <p></p>
       
            
        
        
         <?php
         
          echo"<div id='catalog'>";
          

        
        echo" <div id='adminButtons'>  
        <form action='' method='post'>   
        <input type='submit' value='Show All Albums' />  
        </form>
        ";
        
        echo" <form action='addRecord.php'>
            
            <input type='submit' value='Add New Album' />
            
        </form>";
        
        echo"  <button>Get Reports</button><div id='div1'></div></div>";

        
        $search_value=$_POST["search"];
        
           
        $sql="SELECT * FROM album WHERE artist_name LIKE '%$search_value%'";               
        $stmt = $conn->query($sql);	
        
          echo "<div id ='albumSection'>";
            
        while($record=$stmt->fetch()){
            
            
             echo "<strong>" . $record['album_title'] ."</strong>";
            echo "<br>";
            echo "by " . $record['artist_name'];
           echo "<p></p>";

            echo "Release Year: " .$record['album_year'];
                        echo "<br>";

            echo "Condition: ". $record['album_condition'];
            echo "<br>";
            echo "Price: $" . $record['priceId'];

            echo "<p></p>";
          
                      
            echo "<form action='updateRecord.php' style='display:inline'>
                     <input type='hidden' name='albumId' value='".$record['albumId']."' />
                     <input type='submit' value='Update'>
                  </form>
                ";
            
            echo "<form action='deleteRecord.php' style='display:inline' onsubmit='return confirmDelete(\"".$record['album_title']."\")'>
                     <input type='hidden' name='albumId' value='".$record['albumId']."' />
                     <input type='submit' value='Delete'>
                  </form>
                ";
            
                    echo "<br />";
                      echo "<hr>";
        }
        
        echo "</div>"; 
                echo "</div>"; 

      
        ?>
        
     
        
    </body>     
</html>