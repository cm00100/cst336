<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link  href="css/style.css" rel="stylesheet" type="text/css" />

        <title> Lab 6: Admin Login Page </title>
    </head>
    <body>
        
       <h1> Admin Login </h1>
        
        <form method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="username"/> <br />
            
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="login" value="Login"/>
            
            
        </form>

    </body>
</html>