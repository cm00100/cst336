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
                    //print_r($numbers);
                 }
            
                
            }
            echo "<br>";
          
        }
        
      
       
       
      echo " <center>";
       
        echo "<div id='content'>";
       
        for ($i = 1; $i <= 5; $i++)
        {

            for ($j = 1; $j <= 5; $j++)
            {
                
               
              if($numbers[$i][$j] == 1)
              {
                  
                    echo '<img src="img/blue.png" alt="blue" width="80"/>';
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";  
 
              }
              if($numbers[$i][$j] == 2)
              {
                  
                    echo '<img src="img/purp.png" alt="purple" width="80"/>';
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 

              }
                      
            }
           
            echo "<br>";
             
        }
        
        echo "<p>";

       echo "</div>";
       
       
       
       
       echo "<div id='button'> 
                <form>
                    <input type='submit' value='Play!'/>
                </form>
            </div>";
       
       
       
       
       
        echo "<div id='playerInfo'>";

         echo "<h3>Score</h3>";
        
        
        
        foreach( $nums1 as $type1)
        {
            $count1 += count( $type1); 

        }
        
        echo "<p> Blue: $count1 </p>";

        
        foreach( $nums2 as $type2)
        {
            $count2 += count( $type2);
        }
        
     
        
        echo "<p> Pink: $count2 </p>";
        
        echo "</div>";
        
        echo "<div id='playerInfo2'>";

        
        if ($count1 > $count2)
        {
            echo "<h2>Blue wins!</h2>";   
        }
        else if($count2 > $count1)
        {
            echo "<h2>Pink wins!</h2>";
        }
        else if($count1 == $count2)
        {
                echo "<h2>Tie!</h2>";   
        }
        
        echo"</div";
      
        echo "</center>";
        
       
         
         
    ?>