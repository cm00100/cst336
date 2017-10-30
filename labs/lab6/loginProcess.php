<?php
    
    session_start();
    //print_r ($_POST);
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    print_r ($conn);
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $sql = "SELECT * FROM tc_admin WHERE username = '$username' AND password = '$password'";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);   //expecting only one record
    
    print_r($record);
    
    //echo $password;
    
    
    if(empty($record))
    {
        echo "wrong username or password!";
        
    }
    else{
        $_SESSION['username'] = $record['username'];
        $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lasntName'];
        //echo "right credentials!";
        header("Location: admin.php");  //redirecting to admin portal
    }

?>