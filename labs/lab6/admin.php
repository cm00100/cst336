<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Page </title>
    </head>
    <body>
    
        <h1> TCP ADMIN PAGE </h1>
        <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        
        <hr>
        
        <form action = "addUser.php">
            <input type="submit" value="Add new User" />
        </form>
        
        
        <br/><br/> 
        $users = displayUsers();
        
        foreach ($users as $user)
        {
            echo $user['userId'] .  ' ' . $user['firstName'] . " " . $user['lastName'] . ;
        }

    </body>
</html>