<?php
session_start();
//print_r($_POST);

include 'dbConnection.php';
$conn = getDatabaseConnection();

//print_r($conn);

$username = $_POST['username'];
$password = sha1($_POST['password']);

//The following SQL allows SQL injection
// $sql = "SELECT *
//         FROM tc_admin
//         WHERE username = '$username' 
//         AND   password = '$password'";

$sql = "SELECT *
        FROM system_admin
        WHERE username = :username 
        AND   password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print_r($record);

if (empty($record)) {
    
    echo "wrong username or password!";
    
} else {
    
   
    $_SESSION['username'] = $record['username'];

   header("Location: admin.php"); 
}
?>