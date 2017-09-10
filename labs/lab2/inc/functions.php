
    <?php
        
         for($i = 1; $i < 4; $i++)
            {
                ${"randomValue" . $i} = rand(0,3);
                displaySlots(${"randomValue" . $i}, $i);
            }
    
        displayPoints($randomValue1, $randomValue2, $randomValue3);
        
        
         function play()
          {
            for($i = 1; $i < 4; $i++)
            {
                ${"randomValue" . $i} = rand(0,3);
                displaySlots(${"randomValue" . $i}, $i);
            }
            displayPoints($randomValue1, $randomValue2, $randomValue3);
            
          }
          
                  

    
         function displaySlots($randomValue, $position)
            {
              
              
               switch($randomValue)
                {
                case 0: $slot = "seven";
                        break;
                case 1: $slot = "orange";
                        break;
                case 2: $slot = "cherry";
                        break;
                case 3: $slot = "lemon";
                        break;
                }
           
            echo "<img id = 'reel$position' src = 'img/$slot.png' alt='$slot' title='" . ucfirst($slot) . "' width='70' />";  
              
            }
            
            function displayPoints($randomValue1, $randomValue2, $randomValue3)
            {
                echo "<div id='output'>";
                
                if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3 )
                {
                    switch($randomValue1)
                    {
                        case 0: $points = 1000;
                                echo "<h1>Jackpot!</h1>";
                                break;
                        case 1: $points = 900;
                                break;
                        case 2: $points = 500;
                                break;
                        case 3: $points = 250;
                                break;
                    }
                    
                    echo "<h2>You won $points points! </h2>";
                }
                else
                {
                    echo "<h3> Try again! </h3>";   
                }
                
                echo "</div>";
                
            }
        ?>