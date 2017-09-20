   <?php
        
        
        /*
        
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
         
         */
         
         
        $numbers = array(); 
        $nums1 = array();
        $nums2 = array();
         
         
         
        for ($i = 1; $i <= 5; $i++)
        {


            for ($j = 1; $j <= 5; $j++)
            {
              $randomValue = rand(0,2);
              
   
                 if ($randomValue == 0)
                 {
                    echo "  ";   
                 }
                 
                 
                 else
                 {
                     
                     if($randomValue == 1)
                     {
                        $nums1[$i][$j] = $randomValue;   
                     }
                     else if($randomValue = 2)
                     {
                        $nums2[$i][$j] = $randomValue;   
                     }
                         
                  //$numbers[$i][$j] = $randomValue;
                  echo "  $randomValue  ";
                 }
            
                
            }
            echo "<br>";
          
        }
        
        echo "<p>";
        
       
       
       
     
   
    
        echo "<p>Count: </p>";
        
        
       
        
        
        

        $count1 = 0;
        $count2 = 0;
        
        foreach( $nums1 as $type1)
        {
            $count1 += count( $type1);  
        }
        
        
        foreach( $nums2 as $type2)
        {
            $count2 += count( $type2);
        }
        
        
        if ($count1 > $count2)
        {
            echo "One wins!";   
        }
        else if($count2 > $count1)
        {
            echo "Two wins!";
        }
        else if($count1 == $count2)
        {
                echo "Tie!";   
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