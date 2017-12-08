

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link  href="css/style.css" rel="stylesheet" type="text/css" />

        <title> Admin Login </title>
    </head>
    <body>
        <div id="spacer"></div>
       <div id="otherForms">
       
       <p><legend>Admin: Login</legend></p>
        
        <form method="POST" action="loginProcess.php">
            
            <p>Username: <input type="text" name="username"/> <p />
            
            <p>Password: <input type="password" name="password"/> <p />
            
            <p><input type="submit" name="login" value="Login"/></p>
            
            
        </form>
    </div>    

    </body>
</html>