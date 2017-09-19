   <?php
        
        for ($i = 0; $size <= 20; $size++)
        {

            for ($j = 1; $j <= 5 -$size; $j++)
            {
            echo " ";
            }
            
            for ($j = 1; $j <= 2*$size - 1; $j++)
            {
                echo("*");
            }
            
            echo "<br>";
        }
                    
    
         echo "<p>";
         
         
         
         
        $numbers = array(); 
         
         
         
         
        for ($i = 1; $i <= 5; $i++)
        {


            for ($j = 1; $j <= 5; $j++)
            {
              $randomValue = rand(0,2);
              $number[$i][$j] = $randomValue;
              
              
                echo "     $randomValue     ";
              
            
                
            }
            echo "<br>";
          
        }
        
        echo "<p>";
        
        
        
       for ($i = 1; $i <= 5; $i++)
        {


            for ($j = 1; $j <= 5; $j++)
            {
             
              echo $number[$i][$j];
              
              
              
            
                
            }
            echo "<br>";
          
        }
        
         
       
        
        
        if($randomValue > $randomValue)
        {
            
             echo "<h2>$randomValue wins! </h2>";  
        }
        
        
        
      
         function displayColor($randomValue, $position)
            {
              
              
               switch($randomValue)
                {
                case 0: $ball = " ";
                        break;
                case 1: $ball = "blue";
                        break;
                case 2: $ball = "red";
                        break;
         
                }
           
            echo "<img id = 'reel$position' src = 'img/$slot.png' alt='$slot' title='" . ucfirst($slot) . "' width='70' />";  
              
            }
        
        
       
         
         
    ?>