<!---

The form includes at least six HTML Form Elements


Upon submission of the form, the data is "processed" and new data is displayed. Do not just display the same data.

Upon submission of the form, the form is displayed again, with the submitted values pre-filled.

Check boxes and radio buttons should be accessible (use "label for") 

There is validation for all unset or empty values with error messages. 

There is an external CSS with at least 20 rules	10pts

-->


<!DOCTYPE HTML>  
<html>
        <head>
            <link  href="css/style.css" rel="stylesheet" type="text/css" />
            <link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="stylesheet">
            <meta charset="utf-8" />
     
        </head>
    <body>  
      
      
      
             <?php
        $nameErr = $ageErr = $emailErr = $jobErr = $websiteErr = "";
        $name = $age = $email = $job = $bio = $website = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
          if (empty($_POST["age"])) {
            $ageErr = "Age is required";
          } else {
            $age = test_input($_POST["age"]);
            if($age > 18)
            {
                if (empty($_POST["name"])) {
                $nameErr = "Name is required";
              } else {
                $name = test_input($_POST["name"]);
                
                echo "<h1>Your circus name: ";
                $circusName = str_split($name);
                sort($circusName);
                echo implode('', $circusName). "</h1>";
              }
          
            }
            else {
              echo "<h1>Sorry, we are not accepting applicants underage.</h1>";
            }
          }
          
          if (empty($_POST["email"])) {
            $emailErr = "Email is required";
          } else {
            $email = test_input($_POST["email"]);
            echo "You will receive more information on the email you provided.";
          }
            
          if (empty($_POST["website"])) {
            $website = "";
          } else {
            $website = test_input($_POST["website"]);
          }
        
          if (empty($_POST["bio"])) {
            $bio = "";
          } else {
            $bio = test_input($_POST["bio"]);
          }
        
          if (empty($_POST["job"])) {
            $jobErr = "Job selection is required";
          } else {
            $job = test_input($_POST["job"]);
               
          }
        }
        
  
        
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        ?>
      

        <h1>Circus Application Form</h1>
        <p><span class="error">* required field.</span></p>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
          Name: <input type="text" name="name">
          <span class="error">* <?php echo $nameErr;?></span>
          <br><br>
          Age:
          <input type="text" name="age">
          <span class="error">* <?php echo $ageErr;?></span>
          <br><br>
          E-mail: <input type="text" name="email">
          <span class="error">* <?php echo $emailErr;?></span>
          <br><br>
          Website: <input type="text" name="website">
          <span class="error"><?php echo $websiteErr;?></span>
          <br><br>
          Short Bio: <textarea name="comment" rows="5" cols="40"></textarea>
          <br><br>
          
        
         Gender:
          <input type="radio" name="gender" value="female">Female
          <input type="radio" name="gender" value="male">Male
          <input type="radio" name="gender" value="male">Other
          <br><br>
         
          
          What are you applying as?:
          <select>
            <option name="job" value=""></option>
            <option name="job"  value="acrobat">Acrobat</option>
            <option value="../img/clown.jpg" style="background-image:url(../img/clown.jpg);">Clown</option>
            <option name= "job" value="bigtop">Big Top</option>
            <option name= "job" value="bedofnails">Bed of Nails</option>
            <option name= "job" value="contor">Contortionist</option>
            <option name= "job" value="fire">Fire-Eating</option>
            <option name= "job" value="juggler">Juggling</option>
          </select>
          
          <span class="error">* <?php echo $jobErr;?></span>
          <br><br>
          
          <input type="submit" name="submit" value="Submit">  
        </form>

        <p></p>
        <img src="../img/buddy-verified.png" alt="Buddy Verified" style="width:150px;">

            
            
       
            
       
    </body>
</html>