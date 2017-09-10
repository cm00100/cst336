
    <?php
        
         for($i = 1; $i < 4; $i++)
            {
                ${"randomValue" . $i} = rand(0,2);
                displaySlots(${"randomValue" . $i});
            }
    
        displayPoints($randomValue1, $randomValue2, $randomValue3);
        
        
         function play()
          {
            for($i = 1; $i < 4; $i++)
            {
                ${"randomValue" . $i} = rand(0,2);
                displaySlots(${"randomValue" . $i});
            }
            displayPoints($randomValue1, $randomValue2, $randomValue3);
            
          }
          

    
         function displaySlots($randomValue)
            {
              /*if($randomValue == 0)
              {
                  echo '<img src = "img/seven.png" alt="seven" title="Seven" width="70" />';
              }
              else if ($randomValue == 1)
              {
                  echo '<img src = "img/cherry.png" alt="cherry" title="Cherry" width="70" />';   
              }
              else
              {
                  echo '<img src = "img/lemon.png" alt="lemon" title="Lemon" width="70" />';   
    
              }*/
              
              
              
               switch($randomValue)
                {
                case 0: $slot = "seven";
                        break;
                case 1: $slot = "cherry";
                        break;
                case 2: $slot = "lemon";
                        break;
                }
           
            echo "<img src = 'img/$slot.png' alt='$slot' title='" . ucfirst($slot) . "' width='70' />";  
              
            }
            
            function displayPoints($randomValue1, $randomValue2, $randomValue3)
            {
                echo "<div id='output'>";
                
                if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3)
                {
                    switch($randomValue1)
                    {
                        case 0: $points = 1000;
                                echo "<h1>Jackpot!</h1>";
                                break;
                        case 1: $points = 500;
                                break;
                        case 2: $points = 250;
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