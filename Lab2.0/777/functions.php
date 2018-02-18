<?php
        function displaySymbol($randomValue, $pos) {
         
               echo $randomValue;
   
                switch ($randomValue) {
                    
                    case 0: $symbol = "seven";
                            break;
                    case 1: $symbol = "orange";
                            break;
                    case 2: $symbol = "lemon";
                            break;    
                }            
            
               echo "<img id = 'reel$pos' src='img/$symbol.png' width='70' alt=\"$symbol\" title=\"$symbol\" />";
                
            }
    function displayPoints($randomValue1,$randomValue2,$randomValue3)
            {
                echo "<div id = 'output'";
                if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3)
                {
                    switch($randomValue1)
                    {
                        case 0: $totalPoints =1000;
                        echo "<h1>Jackpot!</h1>";
                        break;
                        case 1: $totalPoints = 500;
                        break;
                        case 2: $totalPoints = 250;
                    }
                    echo "<h2>You Won $totalPoints points!</h2>";
                }else{
                    echo "<h3>Try Again! </h3>";
                }
                echo "</div?";
            }
?>