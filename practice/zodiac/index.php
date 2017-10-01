
<!DOCTYPE html>
<html>
    <head>
        <title>Chinese Zodiac List</title>
        <meta charset="utf-8"/>    
    </head>
    
    
    <body>
    
        <header><h1>Chinese Zodiac List</h1></header>
        
        
            <ul>
                <?php
                
                    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
                

                    for($i = 1500; $i <= 2000; $i++)
                    {
                        echo "Year " . $i;
                       
                         
                         if($i == 1776)
                         {
                            echo "   Independence day!";
                           
                         }
                         if ($i == 1500)
                         {
                            echo "   Happy New Century!";
                        

                         }
                           echo "</br> <hr>";
                    }
                    echo "</br>";
                  
                ?>
                
            </ul>
        
        
        
    </body>
</html>