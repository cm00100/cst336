   <?php
        
        
         
        $numbers = array();
        $nums1 = array();
        $nums2 = array();
         
        $count1 = 0;
        $count2 = 0;
         
        for ($i = 1; $i <= 5; $i++)
        {

            for ($j = 1; $j <= 5; $j++)
            {
              $randomValue = rand(0,2);
              
   
                 if ($randomValue == 0)
                 {
                    echo "   ";
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
                    
                    $numbers[$i][$j] = $randomValue;
                    echo "  $randomValue  ";
                 }
            
                
            }
            echo "<br>";
          
        }
        
        echo "<p>";
        
       
       
       
       
       
        for ($i = 1; $i <= 5; $i++)
        {

            for ($j = 1; $j <= 5; $j++)
            {
              
              if($numbers[$i][$j] == 1)
              {
                  
                    echo '<img src="img/blue.png" alt="blue" width="50"/>';
 
              }
              if($numbers[$i][$j] == 2)
              {
                  
                    echo '<img src="img/purp.png" alt="purple" width="50"/>';

              }
               
                      
            }
            echo "<br>";          
        }
        
        echo "<p>";
       
       
   


        
        foreach( $nums1 as $type1)
        {
            $count1 += count( $type1);  
        }
        
          echo "<p> Blue (player 1): $count1 </p>";
        
        foreach( $nums2 as $type2)
        {
            $count2 += count( $type2);
        }
        
        
      
        
        echo "<p> Purple (player 2): $count2 </p>";
        
        
        if ($count1 > $count2)
        {
            echo "Blue wins!";   
        }
        else if($count2 > $count1)
        {
            echo "Purple wins!";
        }
        else if($count1 == $count2)
        {
                echo "Tie!";   
        }
        

         

        
       
         
         
    ?>