<?php

    function displaySymbol($symbol)
    {
        echo "<img src='../labs/lab2/img/$symbol.png' width ='70' />";  
    }
         
    $symbols = array("lenon", "orange", "cherry");
    // print_r($symbols); //displays array contents, only for debugging purposes
    
    //echo $symbols[0];   //displays first element in array
    //displaySymbol($symbols[2]);
    
    $symbols[] = "grapes";  //add element at the end of the array
    
    //$symbols[2] = "seven";  //replacing value of "seven".
    
    array_push($symbols, "seven");
    
   // displaySymbol($symbols[4]);
   
   
   for($i=0; $i < count($symbols); $i++)
   {
        displaySymbol($symbols[$i]);   
   }
   sort($symbols); //sorts elements in ascending order
   print_r($symbols);
   
   //shuffle($symbols);
   echo "<hr>";
   print_r($symbols);
   echo "<hr>";
   
   
   $lastSymbol = array_pop($symbols);
   displaySymbol($lastSymbol);
   echo "<hr>";
   print_r($symbols);
   
   foreach ($symbols as $symbol)
   {
        displaySymbol($symbol);   
   }
   
   unset($symbol[2]);
   echo "<hr>";
   print_r($symbols);
   $symbols = array_values($symbols);
   echo "<hr>";
   print_r($symbols);
   
   
   // Display a random symbol.
   
   displaySymbol($symbols[rand(0,count($symbols)-1)]);
   
   displaySymbol($symbols[array_rand($symbols)]);
         
?>


<!DOCTYPE html>

<html>
    <head>
        <title>PHP Arrays</title>
    </head>
 
 
     <body>
     
         
     
     
     </body>
    
</html>